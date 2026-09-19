import * as THREE from 'three';
import { GLTFExporter } from 'three/addons/exporters/GLTFExporter.js';
import { writeFile } from 'node:fs/promises';

// Original Champion pendant design. No third-party geometry or textures.
// Run from the project root with node resources/js/motion/create-ribbed-pendant.mjs.
globalThis.FileReader = class {
    readAsArrayBuffer(blob) {
        blob.arrayBuffer().then((result) => {
            this.result = result;
            this.onloadend?.();
        });
    }
};
const scene = new THREE.Scene();
scene.name = 'Champion — Fluted champagne pendant';
scene.userData = {
    author: 'Champion Interior Design',
    provenance:
        'Original parametrically authored geometry for this project; no third-party assets.',
};
const brass = new THREE.MeshStandardMaterial({
    name: 'satin_brass',
    color: '#b99b66',
    metalness: 0.85,
    roughness: 0.28,
});
const dark = new THREE.MeshStandardMaterial({
    name: 'braided_cable',
    color: '#28211c',
    roughness: 0.88,
});
const glass = new THREE.MeshPhysicalMaterial({
    name: 'champagne_fluted_glass',
    color: '#e4c797',
    metalness: 0.05,
    roughness: 0.16,
    transparent: true,
    opacity: 0.55,
    side: THREE.DoubleSide,
    clearcoat: 1,
    clearcoatRoughness: 0.12,
});
const bulb = new THREE.MeshStandardMaterial({
    name: 'opal_bulb',
    color: '#fff4d8',
    roughness: 0.32,
    emissive: '#ffd09a',
    emissiveIntensity: 0.3,
});
function mesh(name, geometry, material, y = 0) {
    const object = new THREE.Mesh(geometry, material);
    object.name = name;
    object.position.y = y;
    scene.add(object);
    return object;
}
function turned(name, points, material) {
    return mesh(
        name,
        new THREE.LatheGeometry(
            points.map(([r, y]) => new THREE.Vector2(r, y)),
            96,
        ),
        material,
    );
}
turned(
    'Beveled ceiling rose',
    [
        [0, 0],
        [0.041, 0],
        [0.047, -0.006],
        [0.047, -0.014],
        [0.04, -0.022],
        [0.014, -0.024],
        [0.01, -0.037],
        [0, -0.037],
    ],
    brass,
);
mesh(
    'Suspension cord',
    new THREE.CylinderGeometry(0.0024, 0.0024, 0.47, 12),
    dark,
    -0.26,
);
turned(
    'Machined socket and collar',
    [
        [0, -0.482],
        [0.012, -0.482],
        [0.014, -0.49],
        [0.014, -0.515],
        [0.027, -0.519],
        [0.031, -0.525],
        [0.031, -0.538],
        [0.048, -0.542],
        [0.05, -0.55],
        [0, -0.55],
    ],
    brass,
);
// True fluted surface: 32 rounded ribs, bell profile, rolled open lower lip.
const angular = 256,
    rows = 48,
    positions = [],
    indices = [];
for (let j = 0; j <= rows; j++) {
    const t = j / rows;
    const radius = 0.042 + 0.178 * Math.sin((t * Math.PI) / 2) ** 0.72;
    for (let i = 0; i <= angular; i++) {
        const theta = (i / angular) * Math.PI * 2;
        const rib =
            0.0055 * Math.sin(Math.PI * t) ** 0.45 * Math.cos(theta * 32);
        positions.push(
            (radius + rib) * Math.sin(theta),
            -0.55 - t * 0.285,
            (radius + rib) * Math.cos(theta),
        );
        if (j < rows && i < angular) {
            const a = j * (angular + 1) + i,
                b = a + angular + 1;
            indices.push(a, b, a + 1, b, b + 1, a + 1);
        }
    }
}
const shade = new THREE.BufferGeometry();
shade.setAttribute('position', new THREE.Float32BufferAttribute(positions, 3));
shade.setIndex(indices);
shade.computeVertexNormals();
mesh('32 sculpted glass flutes', shade, glass);
for (const [name, r, y, tube] of [
    ['Rolled brass lower rim', 0.22, -0.835, 0.004],
    ['Upper retaining ring', 0.049, -0.551, 0.003],
]) {
    const ring = mesh(
        name,
        new THREE.TorusGeometry(r, tube, 10, 128),
        brass,
        y,
    );
    ring.rotation.x = Math.PI / 2;
}
mesh(
    'Inner bulb socket',
    new THREE.CylinderGeometry(0.023, 0.023, 0.07, 32),
    brass,
    -0.585,
);
const globe = mesh(
    'Warm opal light source',
    new THREE.SphereGeometry(0.065, 40, 24),
    bulb,
    -0.697,
);
globe.scale.y = 1.28;
// Visible internal suspension arms and screws give changing silhouettes at oblique angles.
for (let i = 0; i < 3; i++) {
    const angle = (i / 3) * Math.PI * 2;
    const curve = new THREE.CatmullRomCurve3([
        new THREE.Vector3(0, -0.575, 0),
        new THREE.Vector3(Math.sin(angle) * 0.1, -0.66, Math.cos(angle) * 0.1),
        new THREE.Vector3(
            Math.sin(angle) * 0.216,
            -0.826,
            Math.cos(angle) * 0.216,
        ),
    ]);
    mesh(
        `Brass shade support ${i + 1}`,
        new THREE.TubeGeometry(curve, 16, 0.0022, 6, false),
        brass,
    );
}
scene.updateMatrixWorld(true);
const data = await new GLTFExporter().parseAsync(scene, { binary: true });
await writeFile('public/models/pendant/ribbed-pendant.glb', Buffer.from(data));
console.log(
    `Original pendant exported: ${(data.byteLength / 1024).toFixed(0)} KB`,
);
