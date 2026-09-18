import * as THREE from 'three';
import { RoundedBoxGeometry } from 'three/addons/geometries/RoundedBoxGeometry.js';
import { RoomEnvironment } from 'three/addons/environments/RoomEnvironment.js';

/** A conceptual interior, built locally from geometry rather than a project photograph. */
export function initArchitecturalScene(host: HTMLElement): void {
    const canvas = host.querySelector<HTMLCanvasElement>('canvas');
    const hero = host.closest<HTMLElement>('.architecture-hero');
    if (!canvas || !hero) return;

    const motionPreference = matchMedia('(prefers-reduced-motion: reduce)');
    const signal = new AbortController();
    let disposed = false;
    let paused = motionPreference.matches;
    let inView = true;
    let frame = 0;
    let progress = 0;
    let pointerX = 0;
    let pointerY = 0;
    let detail = false;
    let dusk = false;
    const textures: THREE.Texture[] = [];
    let renderer: THREE.WebGLRenderer;

    try {
        renderer = new THREE.WebGLRenderer({
            canvas,
            antialias: true,
            alpha: true,
            powerPreference: 'low-power',
        });
    } catch {
        host.dataset.sceneState = 'fallback';
        return;
    }

    renderer.setPixelRatio(Math.min(devicePixelRatio, 1.5));
    renderer.shadowMap.enabled = true;
    renderer.shadowMap.type = THREE.PCFShadowMap;
    renderer.toneMapping = THREE.ACESFilmicToneMapping;
    renderer.toneMappingExposure = 1.25;

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(34, 1, 0.1, 90);
    const pmrem = new THREE.PMREMGenerator(renderer);
    const environment = new RoomEnvironment();
    const environmentTarget = pmrem.fromScene(environment, 0.04);
    scene.environment = environmentTarget.texture;
    scene.environmentIntensity = 0.4;
    environment.dispose();
    pmrem.dispose();

    function texture(kind: 'stone' | 'wood' | 'fabric'): THREE.CanvasTexture {
        const surface = document.createElement('canvas');
        surface.width = surface.height = 256;
        const context = surface.getContext('2d')!;
        context.fillStyle =
            kind === 'wood'
                ? '#a68159'
                : kind === 'stone'
                  ? '#d1c1aa'
                  : '#cec2ae';
        context.fillRect(0, 0, 256, 256);
        let seed = 42;
        const random = () => {
            seed = (seed * 16807) % 2147483647;
            return seed / 2147483647;
        };
        for (let i = 0; i < 6500; i++) {
            const shade = random() > 0.5 ? '255,255,255' : '40,25,15';
            context.fillStyle = `rgba(${shade},${random() * 0.1})`;
            context.fillRect(
                random() * 256,
                random() * 256,
                kind === 'wood' ? 1 : 2,
                kind === 'wood' ? random() * 60 : 1,
            );
        }
        if (kind === 'stone') {
            for (let row = 0; row < 30; row++) {
                context.strokeStyle = `rgba(95,73,49,${0.03 + random() * 0.08})`;
                context.beginPath();
                for (let x = 0; x < 257; x += 4) {
                    const y = row * 9 + Math.sin(x / 50 + row) * 3;
                    if (x === 0) context.moveTo(x, y);
                    else context.lineTo(x, y);
                }
                context.stroke();
            }
        }
        const result = new THREE.CanvasTexture(surface);
        result.colorSpace = THREE.SRGBColorSpace;
        result.wrapS = result.wrapT = THREE.RepeatWrapping;
        result.anisotropy = Math.min(
            renderer.capabilities.getMaxAnisotropy(),
            4,
        );
        textures.push(result);
        return result;
    }

    const stoneTexture = texture('stone');
    const woodTexture = texture('wood');
    const fabricTexture = texture('fabric');
    const stone = new THREE.MeshStandardMaterial({
        map: stoneTexture,
        roughness: 0.72,
    });
    const plaster = new THREE.MeshStandardMaterial({
        color: '#c3b6a1',
        roughness: 0.92,
    });
    const wood = new THREE.MeshStandardMaterial({
        map: woodTexture,
        color: '#8d6745',
        roughness: 0.65,
    });
    const darkWood = new THREE.MeshStandardMaterial({
        color: '#35281d',
        roughness: 0.7,
    });
    const linen = new THREE.MeshStandardMaterial({
        map: fabricTexture,
        color: '#f3ead9',
        roughness: 1,
    });
    const olive = new THREE.MeshStandardMaterial({
        color: '#555b39',
        roughness: 0.92,
    });
    const brass = new THREE.MeshStandardMaterial({
        color: '#be9556',
        metalness: 0.8,
        roughness: 0.32,
    });
    const black = new THREE.MeshStandardMaterial({
        color: '#211e1a',
        roughness: 0.6,
    });
    const glow = new THREE.MeshStandardMaterial({
        color: '#ffe1a0',
        emissive: '#ffc26b',
        emissiveIntensity: 2,
    });
    const model = new THREE.Group();
    scene.add(model);

    function box(
        w: number,
        h: number,
        d: number,
        x: number,
        y: number,
        z: number,
        material: THREE.Material,
        radius = 0,
    ): THREE.Mesh {
        const geometry = radius
            ? new RoundedBoxGeometry(w, h, d, 3, radius)
            : new THREE.BoxGeometry(w, h, d);
        const mesh = new THREE.Mesh(geometry, material);
        mesh.position.set(x, y, z);
        mesh.castShadow = true;
        mesh.receiveShadow = true;
        model.add(mesh);
        return mesh;
    }

    function cylinder(
        top: number,
        bottom: number,
        height: number,
        x: number,
        y: number,
        z: number,
        material: THREE.Material,
    ): THREE.Mesh {
        const mesh = new THREE.Mesh(
            new THREE.CylinderGeometry(top, bottom, height, 48),
            material,
        );
        mesh.position.set(x, y, z);
        mesh.castShadow = true;
        mesh.receiveShadow = true;
        model.add(mesh);
        return mesh;
    }

    // Open architectural model: the front and left elevations are cut away.
    box(9.4, 0.32, 7.4, 0, -0.2, 0, darkWood);
    box(9.15, 0.12, 7.15, 0, 0.01, 0, stone);
    box(9.2, 3.65, 0.18, 0, 1.82, -3.5, plaster);
    box(0.18, 3.65, 7.1, 4.5, 1.82, 0, plaster);
    for (let index = 0; index < 7; index++) {
        box(0.013, 0.003, 7.05, -3.5 + index * 1.16, 0.075, 0, darkWood);
    }
    for (let index = 0; index < 4; index++) {
        box(9, 0.003, 0.012, 0, 0.075, -2.6 + index * 1.65, darkWood);
    }

    // Ribbed walnut feature wall and an illuminated stone recess.
    box(4.1, 3.55, 0.12, -2.35, 1.8, -3.34, darkWood);
    for (let index = 0; index < 34; index++) {
        box(0.065, 3.5, 0.1, -4.31 + index * 0.119, 1.81, -3.23, wood);
    }
    box(3.3, 2.65, 0.18, 1.55, 1.9, -3.32, stone);
    box(3.45, 0.035, 0.07, 1.55, 3.24, -3.2, glow);
    box(3.45, 0.035, 0.07, 1.55, 0.55, -3.2, glow);
    box(3.65, 0.32, 0.7, 1.4, 0.44, -2.96, wood, 0.04);

    // Abstract artwork: no borrowed photography or external models.
    box(1.48, 1.76, 0.09, 1.55, 2.01, -3.15, darkWood);
    box(1.35, 1.63, 0.035, 1.55, 2.01, -3.085, linen);
    const artwork = new THREE.Mesh(
        new THREE.CircleGeometry(0.46, 48),
        new THREE.MeshStandardMaterial({ color: '#835637', roughness: 1 }),
    );
    artwork.position.set(1.58, 2.13, -3.059);
    model.add(artwork);
    box(0.22, 1.19, 0.014, 1.38, 1.95, -3.04, darkWood);

    // Window frames and a timber pergola allow the light to describe the space.
    for (let index = 0; index < 5; index++) {
        box(0.065, 3.5, 0.065, -4.46, 1.82, -3.4 + index * 1.7, brass);
    }
    box(0.09, 0.12, 7.1, -4.45, 3.56, 0, darkWood);
    box(9.1, 0.14, 0.14, 0, 3.59, -3.43, darkWood);
    for (let index = 0; index < 10; index++) {
        box(0.12, 0.13, 2.05, -4.28 + index * 0.92, 3.57, -2.45, wood);
    }

    // Woven rug, modular linen sofa, cushions and a pair of low tables.
    box(5.3, 0.035, 4.3, -0.55, 0.105, 0.1, linen, 0.08);
    box(3.8, 0.28, 1.35, -1.1, 0.37, -1.6, darkWood, 0.09);
    box(3.85, 0.65, 0.32, -1.1, 0.78, -2.14, linen, 0.12);
    for (let index = 0; index < 3; index++) {
        box(1.15, 0.27, 1.03, -2.3 + index * 1.2, 0.62, -1.47, linen, 0.12);
    }
    box(0.3, 0.58, 1.4, -3.0, 0.67, -1.61, linen, 0.1);
    box(0.3, 0.58, 1.4, 0.8, 0.67, -1.61, linen, 0.1);
    const cushion = box(0.63, 0.55, 0.18, -2.36, 0.99, -1.87, olive, 0.1);
    cushion.rotation.z = 0.15;
    const cushionTwo = box(0.61, 0.51, 0.18, 0.12, 0.95, -1.87, wood, 0.1);
    cushionTwo.rotation.z = -0.13;
    cylinder(0.72, 0.77, 0.32, -0.7, 0.28, 0.35, darkWood);
    cylinder(1.0, 1.0, 0.095, -0.7, 0.485, 0.35, stone);
    cylinder(0.43, 0.47, 0.52, 0.7, 0.37, 0.96, wood);
    cylinder(0.57, 0.57, 0.06, 0.7, 0.66, 0.96, brass);
    box(0.42, 0.055, 0.3, -0.45, 0.56, 0.3, black);
    box(0.39, 0.04, 0.28, -0.48, 0.605, 0.31, linen);
    cylinder(0.12, 0.19, 0.28, -1.0, 0.66, 0.5, darkWood);

    const chair = new THREE.Group();
    const chairParts: THREE.Mesh[] = [];
    chairParts.push(box(1.05, 0.32, 1.15, 2.48, 0.47, 1.2, linen, 0.15));
    chairParts.push(box(1.05, 0.74, 0.25, 2.48, 0.82, 1.7, linen, 0.13));
    for (const x of [2.0, 2.96]) {
        chairParts.push(box(0.09, 0.56, 1.25, x, 0.44, 1.25, wood, 0.035));
    }
    chair.position.set(2.48, 0, 1.2);
    model.add(chair);
    for (const part of chairParts) {
        part.position.sub(chair.position);
        chair.add(part);
    }
    chair.rotation.y = -0.3;

    // A suspended brass light, with actual emissive geometry.
    const ring = new THREE.Mesh(
        new THREE.TorusGeometry(0.92, 0.027, 10, 80),
        brass,
    );
    ring.rotation.x = Math.PI / 2;
    ring.position.set(-0.7, 2.72, 0.05);
    model.add(ring);
    const diffuser = new THREE.Mesh(
        new THREE.TorusGeometry(0.92, 0.012, 8, 80),
        glow,
    );
    diffuser.rotation.x = Math.PI / 2;
    diffuser.position.set(-0.7, 2.697, 0.05);
    model.add(diffuser);
    for (const x of [-1.3, -0.1])
        cylinder(0.006, 0.006, 0.84, x, 3.13, 0.05, black);

    // A sculptural indoor tree provides organic contrast to the joinery.
    cylinder(0.36, 0.26, 0.64, 3.45, 0.4, -2.0, stone);
    cylinder(0.035, 0.065, 1.65, 3.45, 1.52, -2.0, wood);
    const leafGeometry = new THREE.SphereGeometry(1, 10, 8);
    for (let index = 0; index < 35; index++) {
        const angle = index * 2.39996;
        const radius = 0.2 + (index % 6) * 0.1;
        const leaf = new THREE.Mesh(leafGeometry, olive);
        leaf.position.set(
            3.45 + Math.cos(angle) * radius,
            1.65 + (index % 9) * 0.115,
            -2 + Math.sin(angle) * radius,
        );
        leaf.scale.set(0.27, 0.065, 0.13);
        leaf.rotation.set(index * 0.19, angle, index * 0.28);
        leaf.castShadow = true;
        model.add(leaf);
    }

    const ground = new THREE.Mesh(
        new THREE.PlaneGeometry(100, 100),
        new THREE.ShadowMaterial({ opacity: 0.28 }),
    );
    ground.rotation.x = -Math.PI / 2;
    ground.position.y = -0.39;
    ground.receiveShadow = true;
    scene.add(ground);

    const sky = new THREE.HemisphereLight('#fff0d5', '#46392d', 2.0);
    scene.add(sky);
    const sunlight = new THREE.DirectionalLight('#ffe0b0', 4);
    sunlight.position.set(-6, 9, 4);
    sunlight.castShadow = true;
    sunlight.shadow.mapSize.set(1024, 1024);
    sunlight.shadow.camera.left = -8;
    sunlight.shadow.camera.right = 8;
    sunlight.shadow.camera.top = 8;
    sunlight.shadow.camera.bottom = -8;
    sunlight.shadow.normalBias = 0.035;
    sunlight.shadow.bias = -0.0001;
    scene.add(sunlight);
    const lamp = new THREE.PointLight('#ffd494', 14, 9, 2);
    lamp.position.set(-0.7, 2.6, 0.05);
    scene.add(lamp);
    const recessLight = new THREE.PointLight('#ffc578', 7, 7, 2);
    recessLight.position.set(1.5, 2.85, -2.9);
    scene.add(recessLight);

    const targetCamera = new THREE.Vector3();
    const targetLook = new THREE.Vector3(0, 1.1, 0);
    const currentLook = targetLook.clone();
    camera.position.set(-11, 8.3, 13.5);

    function render(): void {
        frame = 0;
        if (disposed || !inView || document.hidden) return;
        const travel = progress;
        const compact = host!.clientWidth < 650;
        targetCamera.set(
            (detail ? -6.2 : -11) + travel * 3 + pointerX * 0.65,
            (detail ? 4.5 : 8.3) - travel * 1.8 + pointerY * 0.35,
            (detail ? 8.8 : 13.5) - travel * 2.2,
        );
        targetCamera.multiplyScalar(
            compact ? 1.08 : Math.max(1, 1.55 / camera.aspect),
        );
        targetLook.set(
            detail ? 0.15 : 0,
            detail ? 1.0 : 1.1,
            detail ? -0.5 : 0,
        );
        const immediate = paused || motionPreference.matches;
        camera.position.lerp(targetCamera, immediate ? 1 : 0.075);
        currentLook.lerp(targetLook, immediate ? 1 : 0.075);
        camera.lookAt(currentLook);
        renderer.render(scene, camera);
        host!.dataset.sceneState = 'ready';
        hero!.classList.add('scene-ready');
        if (
            camera.position.distanceTo(targetCamera) > 0.003 ||
            currentLook.distanceTo(targetLook) > 0.003
        )
            requestRender();
    }

    function requestRender(): void {
        if (!frame && !disposed) frame = requestAnimationFrame(render);
    }

    const resize = new ResizeObserver(() => {
        const width = host.clientWidth;
        const height = host.clientHeight;
        if (!width || !height) return;
        renderer.setSize(width, height, false);
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        requestRender();
    });
    resize.observe(host);

    const observer = new IntersectionObserver(([entry]) => {
        inView = entry.isIntersecting;
        if (inView) requestRender();
    });
    observer.observe(hero);

    hero.addEventListener(
        'pointermove',
        (event) => {
            if (event.pointerType !== 'mouse' || paused) return;
            const rect = hero.getBoundingClientRect();
            pointerX = (event.clientX - rect.left) / rect.width - 0.5;
            pointerY = event.clientY / innerHeight - 0.5;
            requestRender();
        },
        { signal: signal.signal },
    );
    hero.addEventListener(
        'pointerleave',
        () => {
            if (paused) return;
            pointerX = pointerY = 0;
            requestRender();
        },
        { signal: signal.signal },
    );
    window.addEventListener(
        'scroll',
        () => {
            if (paused) return;
            progress = THREE.MathUtils.clamp(
                -hero.getBoundingClientRect().top / innerHeight,
                0,
                1,
            );
            if (!paused && inView) requestRender();
        },
        { passive: true, signal: signal.signal },
    );
    document.addEventListener('visibilitychange', requestRender, {
        signal: signal.signal,
    });

    const pauseButton =
        hero.querySelector<HTMLButtonElement>('[data-scene-pause]');
    function updatePause(): void {
        pauseButton?.setAttribute('aria-pressed', String(paused));
        if (pauseButton)
            pauseButton.textContent = paused ? 'Enable motion' : 'Pause motion';
        requestRender();
    }
    pauseButton?.addEventListener(
        'click',
        () => {
            paused = !paused;
            updatePause();
        },
        { signal: signal.signal },
    );
    motionPreference.addEventListener(
        'change',
        () => {
            paused = motionPreference.matches;
            updatePause();
        },
        { signal: signal.signal },
    );
    updatePause();

    hero.querySelectorAll<HTMLButtonElement>('[data-scene-light]').forEach(
        (button) => {
            button.addEventListener(
                'click',
                () => {
                    dusk = button.dataset.sceneLight === 'dusk';
                    sunlight.intensity = dusk ? 0.8 : 4;
                    sky.intensity = dusk ? 0.7 : 2;
                    lamp.intensity = dusk ? 24 : 14;
                    renderer.toneMappingExposure = dusk ? 1.1 : 1.25;
                    hero.dataset.lighting = dusk ? 'dusk' : 'day';
                    hero.querySelectorAll('[data-scene-light]').forEach(
                        (item) =>
                            item.setAttribute(
                                'aria-pressed',
                                String(item === button),
                            ),
                    );
                    requestRender();
                },
                { signal: signal.signal },
            );
        },
    );
    hero.querySelector<HTMLButtonElement>(
        '[data-scene-detail]',
    )?.addEventListener(
        'click',
        (event) => {
            detail = !detail;
            const button = event.currentTarget as HTMLButtonElement;
            button.setAttribute('aria-pressed', String(detail));
            button.textContent = detail
                ? 'View full space ↗'
                : 'Explore the details ↗';
            requestRender();
        },
        { signal: signal.signal },
    );

    function dispose(): void {
        if (disposed) return;
        disposed = true;
        cancelAnimationFrame(frame);
        signal.abort();
        resize.disconnect();
        observer.disconnect();
        const geometries = new Set<THREE.BufferGeometry>();
        const materials = new Set<THREE.Material>();
        scene.traverse((object) => {
            if (object instanceof THREE.Mesh) {
                geometries.add(object.geometry);
                for (const material of Array.isArray(object.material)
                    ? object.material
                    : [object.material])
                    materials.add(material);
            }
        });
        geometries.forEach((geometry) => geometry.dispose());
        materials.forEach((material) => material.dispose());
        textures.forEach((item) => item.dispose());
        environmentTarget.dispose();
        renderer.dispose();
    }
    canvas.addEventListener(
        'webglcontextlost',
        (event) => {
            event.preventDefault();
            hero.classList.remove('scene-ready');
            host.dataset.sceneState = 'fallback';
            dispose();
        },
        { signal: signal.signal },
    );
    window.addEventListener(
        'pagehide',
        (event) => {
            if (!event.persisted) dispose();
        },
        { signal: signal.signal },
    );
}
