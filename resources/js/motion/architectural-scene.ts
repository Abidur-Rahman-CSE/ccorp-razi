import * as THREE from 'three';
import { GLTFLoader } from 'three/addons/loaders/GLTFLoader.js';
import { RoomEnvironment } from 'three/addons/environments/RoomEnvironment.js';

/** Photograph-space anchors keep the pendant registered when the cover crop changes. */
export function initArchitecturalScene(host: HTMLElement): void {
    const hero = host.closest<HTMLElement>('.architecture-hero');
    const canvas = host.querySelector<HTMLCanvasElement>('canvas');
    const offPlate = host.querySelector<HTMLImageElement>('[data-room-off]');
    const onPlate = host.querySelector<HTMLImageElement>('[data-room-on]');
    if (!hero || !canvas || !offPlate || !onPlate) return;

    const detailPlate = host.querySelector<HTMLImageElement>(
        '[data-detail-plate]',
    );
    const introCopy = hero.querySelector<HTMLElement>('.architecture-copy');
    const detailCopy = hero.querySelector<HTMLElement>('.atmosphere-chapter');
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    const abort = new AbortController();
    const { signal } = abort;
    const screen = document.querySelector<HTMLElement>('[data-wood-reveal]');
    const pause = hero.querySelector<HTMLButtonElement>('[data-scene-pause]');
    const chapter = hero.querySelector<HTMLElement>('[data-scene-chapter]');
    let renderer: THREE.WebGLRenderer | undefined;
    let model: THREE.Group | undefined;
    let environment: THREE.WebGLRenderTarget | undefined;
    let disposed = false;
    let ready = false;
    let failed = false;
    let paused = false;
    let visible = true;
    let frame = 0;
    let progress = 0;
    let lastTime = 0;
    let width = 1;
    let height = 1;
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(35, 1, 0.1, 30);
    camera.position.z = 5;
    const luminousMaterials: THREE.MeshStandardMaterial[] = [];
    const clamp = THREE.MathUtils.clamp;
    const ease = (value: number, from: number, to: number) =>
        THREE.MathUtils.smoothstep(value, from, to);

    function releaseObject(object: THREE.Object3D): void {
        const materials = new Set<THREE.Material>();
        const textures = new Set<THREE.Texture>();
        object.traverse((child) => {
            if (!(child instanceof THREE.Mesh)) return;
            child.geometry.dispose();
            const list = Array.isArray(child.material)
                ? child.material
                : [child.material];
            list.forEach((material: THREE.Material) => materials.add(material));
        });
        materials.forEach((material) => {
            Object.values(material).forEach((value: unknown) => {
                if (value instanceof THREE.Texture) textures.add(value);
            });
            material.dispose();
        });
        textures.forEach((texture) => texture.dispose());
    }

    function fallback(): void {
        ready = false;
        failed = true;
        hero!.classList.remove('scene-ready');
        hero!.classList.add('scene-static');
        host.dataset.sceneState = 'fallback';
        if (pause) pause.hidden = true;
        cancelAnimationFrame(frame);
        frame = 0;
    }

    function draw(time: number): void {
        frame = 0;
        if (disposed || document.hidden) return;
        const isStatic = reducedMotion.matches || !ready;
        const rect = hero!.getBoundingClientRect();
        const distance = Math.max(
            1,
            hero!.offsetHeight -
                (host.parentElement?.clientHeight ?? host.clientHeight),
        );
        const target = isStatic
            ? 1
            : paused
              ? progress
              : clamp(-rect.top / distance, 0, 1);
        const delta = Math.min(64, lastTime ? time - lastTime : 16);
        lastTime = time;
        progress += (target - progress) * (1 - Math.exp(-delta / 65));
        if (Math.abs(target - progress) < 0.0001) progress = target;
        const opening = ease(progress, 0, 0.3);
        // The close timber plane conceals both the photographic cut and ceiling registration.
        const crossing = ease(progress, 0.43, 0.61);
        const inDetail = progress >= 0.52;
        const approach = ease(progress, 0.2, 0.52);
        const settle = ease(progress, 0.52, 0.7);
        const plateScale = inDetail
            ? 1.075 - settle * 0.055
            : 1 + opening * 0.055 + approach * 0.02;
        const plateShift = inDetail ? 0.012 * (1 - settle) : -0.012 * approach;
        const light = ease(progress, 0.025, 0.3);
        const showDetail = !isStatic && progress > 0.69;
        hero!.style.setProperty('--entrance', String(isStatic ? 1 : opening));
        hero!.style.setProperty(
            '--detail-reveal',
            String(!isStatic && inDetail ? 1 : 0),
        );
        hero!.style.setProperty(
            '--partition-x',
            `${78 + opening * 28 - crossing * 224}%`,
        );
        hero!.style.setProperty(
            '--plate-scale',
            String(isStatic ? 1 : plateScale),
        );
        hero!.style.setProperty(
            '--plate-shift',
            `${isStatic ? 0 : plateShift * width}px`,
        );
        hero!.style.setProperty(
            '--intro-opacity',
            String(isStatic ? 1 : 1 - ease(progress, 0.3, 0.42)),
        );
        hero!.style.setProperty(
            '--detail-copy',
            String(isStatic ? 0 : ease(progress, 0.69, 0.79)),
        );
        if (introCopy) {
            introCopy.inert = !isStatic && progress > 0.42;
            introCopy.setAttribute('aria-hidden', String(introCopy.inert));
        }
        if (detailCopy) {
            detailCopy.inert = !showDetail;
            detailCopy.setAttribute('aria-hidden', String(!showDetail));
        }
        hero!.style.setProperty('--room-light', String(light));
        hero!.dataset.sceneProgress = progress.toFixed(3);
        hero!.style.setProperty('--story-progress', String(progress));
        if (chapter)
            chapter.textContent =
                progress < 0.25
                    ? '01 / Scroll to bring the room to life'
                    : '01 / A space comes to life';

        if (model && renderer && visible && !isStatic) {
            // Apply the same modest photographic pan and scale to the ceiling anchor.
            const imageScale = Math.max(width / 1536, height / 1024);
            const imageWidth = 1536 * imageScale;
            const imageHeight = 1024 * imageScale;
            const cropX = (width - imageWidth) * (width < 901 ? 0.68 : 0.5);
            const cropY = (height - imageHeight) * 0.5;
            const anchorX =
                (1060 * imageScale + cropX - width / 2) * plateScale +
                width / 2 +
                plateShift * width;
            const anchorY =
                ((inDetail ? 90 : 120) * imageScale + cropY - height / 2) *
                    plateScale +
                height / 2;
            const finalHeight =
                (inDetail ? 290 : 260) * imageScale * plateScale;
            const tangent = Math.tan(THREE.MathUtils.degToRad(camera.fov / 2));
            const pixelToWorld = (2 * tangent * 5) / height;
            model.position.set(
                (anchorX - width / 2) * pixelToWorld,
                (height / 2 - anchorY) * pixelToWorld,
                0,
            );
            model.scale.setScalar(finalHeight * pixelToWorld);
            model.rotation.set(0, 0, 0);
            luminousMaterials.forEach((material) => {
                material.emissiveIntensity = (inDetail ? 1 : light) * 1.65;
            });
            renderer.render(scene, camera);
            host.style.setProperty('--pendant-x', `${anchorX}px`);
            host.style.setProperty('--pendant-y', `${anchorY}px`);
            host.style.setProperty('--pendant-seated', '1');
        }
        if (screen) {
            const screenRect = screen.getBoundingClientRect();
            const reveal =
                isStatic || paused
                    ? 1
                    : ease(
                          (window.innerHeight - screenRect.top) /
                              (window.innerHeight * 0.72),
                          0.1,
                          1,
                      );
            screen.style.setProperty('--screen-open', String(reveal));
        }
        if (Math.abs(target - progress) > 0.0001) requestDraw();
    }

    function requestDraw(): void {
        if (!disposed && !frame && !document.hidden)
            frame = requestAnimationFrame(draw);
    }

    function resize(): void {
        width = host.clientWidth;
        height = host.clientHeight;
        if (!width || !height) return;
        camera.aspect = width / height;
        camera.updateProjectionMatrix();
        renderer?.setPixelRatio(
            Math.min(window.devicePixelRatio, width < 901 ? 1.5 : 1.75),
        );
        renderer?.setSize(width, height, false);
        requestDraw();
    }

    function preferences(): void {
        hero!.classList.toggle('scene-static', reducedMotion.matches || failed);
        if (pause) {
            pause.hidden = reducedMotion.matches || !ready;
            pause.setAttribute('aria-pressed', String(paused));
            pause.textContent = paused ? 'Enable motion' : 'Pause motion';
        }
        resize();
    }

    const resizeObserver = new ResizeObserver(resize);
    resizeObserver.observe(host);
    const intersectionObserver = new IntersectionObserver(([entry]) => {
        visible = entry.isIntersecting;
        requestDraw();
    });
    intersectionObserver.observe(host);
    window.addEventListener('scroll', requestDraw, { passive: true, signal });
    document.addEventListener('visibilitychange', requestDraw, { signal });
    reducedMotion.addEventListener('change', preferences, { signal });
    pause?.addEventListener(
        'click',
        () => {
            paused = !paused;
            preferences();
        },
        { signal },
    );
    canvas.addEventListener(
        'webglcontextlost',
        (event) => {
            event.preventDefault();
            fallback();
        },
        { signal },
    );
    window.addEventListener(
        'pagehide',
        (event) => {
            if (event.persisted) return;
            disposed = true;
            cancelAnimationFrame(frame);
            abort.abort();
            resizeObserver.disconnect();
            intersectionObserver.disconnect();
            if (model) releaseObject(model);
            environment?.dispose();
            renderer?.dispose();
        },
        { signal },
    );

    // A static photographic composition is the default; enhance only after every asset succeeds.
    if (reducedMotion.matches) {
        fallback();
        return;
    }
    try {
        renderer = new THREE.WebGLRenderer({
            canvas,
            alpha: true,
            antialias: true,
            powerPreference: 'low-power',
        });
        renderer.setClearColor(0x000000, 0);
        renderer.outputColorSpace = THREE.SRGBColorSpace;
        renderer.toneMapping = THREE.ACESFilmicToneMapping;
        renderer.toneMappingExposure = 0.88;
        const generator = new THREE.PMREMGenerator(renderer);
        const room = new RoomEnvironment();
        environment = generator.fromScene(room, 0.04);
        scene.environment = environment.texture;
        scene.environmentIntensity = 0.65;
        room.dispose();
        generator.dispose();
        const daylight = new THREE.DirectionalLight('#d9e6ff', 2.1);
        daylight.position.set(4, 3, 5);
        scene.add(
            daylight,
            new THREE.HemisphereLight('#fff0da', '#58402b', 1.1),
        );
        resize();
        void Promise.all([
            new GLTFLoader().loadAsync(host.dataset.model!),
            offPlate.decode(),
            onPlate.decode(),
            detailPlate?.decode(),
        ])
            .then(([gltf]) => {
                if (disposed || failed) {
                    releaseObject(gltf.scene);
                    return;
                }
                model = new THREE.Group();
                const bounds = new THREE.Box3().setFromObject(gltf.scene);
                const size = bounds.getSize(new THREE.Vector3());
                const center = bounds.getCenter(new THREE.Vector3());
                gltf.scene.position.set(-center.x, -bounds.max.y, -center.z);
                const normalized = new THREE.Group();
                normalized.add(gltf.scene);
                normalized.scale.setScalar(1 / size.y);
                model.add(normalized);
                model.traverse((child) => {
                    if (!(child instanceof THREE.Mesh)) return;
                    const materials = Array.isArray(child.material)
                        ? child.material
                        : [child.material];
                    materials.forEach(
                        (material: THREE.MeshStandardMaterial) => {
                            if (
                                material.name.includes('glass') ||
                                material.name.includes('globe')
                            ) {
                                material.emissive.set('#ffd39a');
                                material.emissiveIntensity = 0;
                                luminousMaterials.push(material);
                            } else {
                                material.color.set('#c5a576');
                            }
                        },
                    );
                });
                scene.add(model);
                progress = 0;
                ready = true;
                host.dataset.sceneState = 'ready';
                hero!.classList.add('scene-ready');
                preferences();
                progress = clamp(
                    -hero!.getBoundingClientRect().top /
                        Math.max(
                            1,
                            hero!.offsetHeight -
                                (host.parentElement?.clientHeight ??
                                    host.clientHeight),
                        ),
                    0,
                    1,
                );
            })
            .catch(() => {
                fallback();
                renderer?.dispose();
            });
    } catch {
        fallback();
        renderer?.dispose();
    }
}
