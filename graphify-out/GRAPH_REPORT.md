# Graph Report - .  (2026-09-15)

## Corpus Check
- Corpus is ~28,826 words - fits in a single context window. You may not need a graph.

## Summary
- 727 nodes · 1323 edges · 86 communities (53 shown, 33 thin omitted)
- Extraction: 99% EXTRACTED · 1% INFERRED · 0% AMBIGUOUS · INFERRED: 7 edges (avg confidence: 0.54)
- Token cost: 0 input · 0 output

## Community Hubs (Navigation)
- resources_js_components_delete_user, ...
- app_actions_fortify_createnewuser, ap...
- composer_scripts, composer_scripts_ci...
- babel_plugin_react_compiler, laravel_...
- app_concerns_profilevalidationrules, ...
- resources_js_components_app_content, ...
- resources_js_components_alert_error, ...
- resources_js_app, resources_js_app_wi...
- resources_js_components_nav_user_navu...
- resources_js_components_app_header_ap...
- resources_js_components_ui_badge, res...
- resources_js_components_app_header, r...
- resources_js_components_nav_user, res...
- ref_resources_js_d_ts, ref_resources_...
- components, components_aliases, compo...
- app_http_middleware_handleappearance,...
- composer_require_dev, composer_requir...
- resources_js_types_auth, resources_js...
- class_variance_authority, package_dep...
- composer, composer_description, compo...
- composer_require, composer_require_in...
- composer_allow_plugins_pestphp_pest_p...
- resources_js_components_ui_toggle, re...
- basetestcase, tests_pest, tests_pest_...
- composer_autoload, composer_autoload_...
- composer_extra, composer_extra_larave...
- resources_js_components_ui_placeholde...
- composer_autoload_dev, composer_autol...
- composer_keywords, ref_framework, ref...
- resources_js_components_ui_icon, reso...
- clsx, package_dependencies_clsx
- concurrently, package_dependencies_co...
- inertiajs_react, package_dependencies...
- inertiajs_vite, package_dependencies_...
- input_otp, package_dependencies_input...
- laravel_passkeys, package_dependencie...
- laravel_vite_plugin, package_dependen...
- lucide_react, package_dependencies_lu...
- package_dependencies_radix_ui_react_a...
- package_dependencies_radix_ui_react_c...
- package_dependencies_radix_ui_react_c...
- package_dependencies_radix_ui_react_d...
- package_dependencies_radix_ui_react_d...
- package_dependencies_radix_ui_react_l...
- package_dependencies_radix_ui_react_n...
- package_dependencies_radix_ui_react_s...
- package_dependencies_radix_ui_react_t...
- package_dependencies_radix_ui_react_t...
- package_dependencies_radix_ui_react_t...
- package_dependencies_react, react
- package_dependencies_react_dom, react...
- package_dependencies_sonner, sonner
- package_dependencies_tailwind_merge, ...
- package_dependencies_tailwindcss, tai...
- package_dependencies_tailwindcss_vite...
- package_dependencies_tw_animate_css, ...
- package_dependencies_types_react, typ...
- package_dependencies_types_react_dom,...
- package_dependencies_vite, vite
- package_dependencies_vitejs_plugin_re...

## God Nodes (most connected - your core abstractions)
1. `cn()` - 124 edges
2. `Button()` - 22 edges
3. `InputError()` - 14 edges
4. `compilerOptions` - 14 edges
5. `User` - 13 edges
6. `scripts` - 13 edges
7. `require-dev` - 12 edges
8. `useAppearance()` - 12 edges
9. `Input()` - 11 edges
10. `Label()` - 11 edges

## Surprising Connections (you probably didn't know these)
- `PasswordInput()` --calls--> `cn()`  [EXTRACTED]
  resources/js/components/password-input.tsx → resources/js/lib/utils.ts
- `BreadcrumbEllipsis()` --calls--> `cn()`  [EXTRACTED]
  resources/js/components/ui/breadcrumb.tsx → resources/js/lib/utils.ts
- `CardFooter()` --calls--> `cn()`  [EXTRACTED]
  resources/js/components/ui/card.tsx → resources/js/lib/utils.ts
- `DialogOverlay()` --calls--> `cn()`  [EXTRACTED]
  resources/js/components/ui/dialog.tsx → resources/js/lib/utils.ts
- `DropdownMenuCheckboxItem()` --calls--> `cn()`  [EXTRACTED]
  resources/js/components/ui/dropdown-menu.tsx → resources/js/lib/utils.ts

## Import Cycles
- None detected.

## Communities (86 total, 33 thin omitted)

### Community 0 - "resources_js_components_delete_user, ..."
Cohesion: 0.06
Nodes (45): Heading(), InputError(), Props, ManageTwoFactor(), Props, Props, PasskeyRegistration(), Props (+37 more)

### Community 1 - "app_actions_fortify_createnewuser, ap..."
Cohesion: 0.06
Nodes (23): CreateNewUser, ResetUserPassword, Controller, RedirectResponse, Request, Response, ProfileController, RedirectResponse (+15 more)

### Community 2 - "composer_scripts, composer_scripts_ci..."
Cohesion: 0.05
Nodes (39): scripts, ci:check, dev, lint, lint:check, post-autoload-dump, post-create-project-cmd, post-root-package-install (+31 more)

### Community 3 - "babel_plugin_react_compiler, laravel_..."
Cohesion: 0.05
Nodes (36): babel-plugin-react-compiler, @laravel/multiplex, @laravel/vite-plugin-wayfinder, lightningcss-linux-x64-gnu, lightningcss-win32-x64-msvc, devDependencies, babel-plugin-react-compiler, @laravel/vite-plugin-wayfinder (+28 more)

### Community 4 - "app_concerns_profilevalidationrules, ..."
Cohesion: 0.08
Nodes (16): emailRules(), nameRules(), profileRules(), User, Authenticatable, UserFactory, DatabaseSeeder, Factory (+8 more)

### Community 5 - "resources_js_components_app_content, ..."
Cohesion: 0.13
Nodes (19): AppContent(), Props, AppShell(), Props, AppSidebar(), AppSidebarHeader(), Breadcrumbs(), Breadcrumb() (+11 more)

### Community 6 - "resources_js_components_alert_error, ..."
Cohesion: 0.11
Nodes (16): AlertError(), AppLogo(), AppLogoIcon(), Props, Alert(), AlertDescription(), AlertTitle(), alertVariants (+8 more)

### Community 7 - "resources_js_app, resources_js_app_wi..."
Cohesion: 0.13
Nodes (22): AppearanceToggleTab(), Toaster(), Tooltip(), TooltipProvider(), TooltipTrigger(), Appearance, applyTheme(), getStoredAppearance() (+14 more)

### Community 8 - "resources_js_components_nav_user_navu..."
Cohesion: 0.10
Nodes (25): NavUser(), Separator(), SheetDescription(), Sidebar(), SidebarContext, SidebarGroupAction(), SidebarInput(), SidebarInset() (+17 more)

### Community 9 - "resources_js_components_app_header_ap..."
Cohesion: 0.13
Nodes (23): AppHeader(), footerNavItems, mainNavItems, NavFooter(), NavMain(), SidebarContent(), SidebarFooter(), SidebarGroup() (+15 more)

### Community 10 - "resources_js_components_ui_badge, res..."
Cohesion: 0.14
Nodes (19): Badge(), badgeVariants, NavigationMenu(), NavigationMenuContent(), NavigationMenuIndicator(), NavigationMenuItem(), NavigationMenuLink(), NavigationMenuList() (+11 more)

### Community 11 - "resources_js_components_app_header, r..."
Cohesion: 0.14
Nodes (17): mainNavItems, Props, rightNavItems, Avatar(), AvatarFallback(), AvatarImage(), Sheet(), SheetContent() (+9 more)

### Community 12 - "resources_js_components_nav_user, res..."
Cohesion: 0.13
Nodes (16): DropdownMenu(), DropdownMenuCheckboxItem(), DropdownMenuContent(), DropdownMenuGroup(), DropdownMenuItem(), DropdownMenuLabel(), DropdownMenuRadioItem(), DropdownMenuSeparator() (+8 more)

### Community 13 - "ref_resources_js_d_ts, ref_resources_..."
Cohesion: 0.11
Nodes (18): resources/js/**/*.d.ts, resources/js/**/*.ts, resources/js/**/*.tsx, compilerOptions, allowJs, esModuleInterop, forceConsistentCasingInFileNames, isolatedModules (+10 more)

### Community 14 - "components, components_aliases, compo..."
Cohesion: 0.11
Nodes (17): aliases, components, hooks, lib, ui, utils, iconLibrary, rsc (+9 more)

### Community 15 - "app_http_middleware_handleappearance,..."
Cohesion: 0.24
Nodes (7): HandleAppearance, Request, Response, HandleInertiaRequests, Request, Closure, Middleware

### Community 16 - "composer_require_dev, composer_requir..."
Cohesion: 0.17
Nodes (12): require-dev, fakerphp/faker, larastan/larastan, laravel/boost, laravel/pail, laravel/pao, laravel/pint, laravel/sail (+4 more)

### Community 17 - "resources_js_types_auth, resources_js..."
Cohesion: 0.22
Nodes (9): Auth, Passkey, TwoFactorSecretKey, TwoFactorSetupData, User, InertiaConfig, @inertiajs/core, InputHTMLAttributes (+1 more)

### Community 18 - "class_variance_authority, package_dep..."
Cohesion: 0.22
Nodes (9): class-variance-authority, dependencies, class-variance-authority, @radix-ui/react-select, @radix-ui/react-separator, typescript, @radix-ui/react-select, @radix-ui/react-separator (+1 more)

### Community 19 - "composer, composer_description, compo..."
Cohesion: 0.25
Nodes (7): description, license, minimum-stability, name, prefer-stable, $schema, type

### Community 20 - "composer_require, composer_require_in..."
Cohesion: 0.25
Nodes (8): require, inertiajs/inertia-laravel, laravel/chisel, laravel/fortify, laravel/framework, laravel/tinker, laravel/wayfinder, php

### Community 21 - "composer_allow_plugins_pestphp_pest_p..."
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 22 - "resources_js_components_ui_toggle, re..."
Cohesion: 0.43
Nodes (5): ToggleGroup(), ToggleGroupContext, ToggleGroupItem(), Toggle(), toggleVariants

### Community 24 - "composer_autoload, composer_autoload_..."
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 25 - "composer_extra, composer_extra_larave..."
Cohesion: 0.40
Nodes (5): extra, laravel, post-create-project, dont-discover, installer

### Community 29 - "composer_autoload_dev, composer_autol..."
Cohesion: 0.67
Nodes (3): autoload-dev, psr-4, Tests\\

### Community 30 - "composer_keywords, ref_framework, ref..."
Cohesion: 0.67
Nodes (3): keywords, framework, laravel

## Knowledge Gaps
- **190 isolated node(s):** `$schema`, `style`, `rsc`, `tsx`, `config` (+185 more)
  These have ≤1 connection - possible missing edges or undocumented components.
- **33 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `cn()` connect `resources_js_components_ui_badge, res...` to `resources_js_components_delete_user, ...`, `resources_js_components_app_content, ...`, `resources_js_components_alert_error, ...`, `resources_js_app, resources_js_app_wi...`, `resources_js_components_nav_user_navu...`, `resources_js_components_app_header_ap...`, `resources_js_components_app_header, r...`, `resources_js_components_nav_user, res...`, `resources_js_components_ui_toggle, re...`?**
  _High betweenness centrality (0.093) - this node is a cross-community bridge._
- **Why does `dependencies` connect `class_variance_authority, package_dep...` to `babel_plugin_react_compiler, laravel_...`, `clsx, package_dependencies_clsx`, `concurrently, package_dependencies_co...`, `inertiajs_react, package_dependencies...`, `inertiajs_vite, package_dependencies_...`, `input_otp, package_dependencies_input...`, `laravel_passkeys, package_dependencie...`, `laravel_vite_plugin, package_dependen...`, `lucide_react, package_dependencies_lu...`, `package_dependencies_radix_ui_react_a...`, `package_dependencies_radix_ui_react_c...`, `package_dependencies_radix_ui_react_c...`, `package_dependencies_radix_ui_react_d...`, `package_dependencies_radix_ui_react_d...`, `package_dependencies_radix_ui_react_l...`, `package_dependencies_radix_ui_react_n...`, `package_dependencies_radix_ui_react_s...`, `package_dependencies_radix_ui_react_t...`, `package_dependencies_radix_ui_react_t...`, `package_dependencies_radix_ui_react_t...`, `package_dependencies_react, react`, `package_dependencies_react_dom, react...`, `package_dependencies_sonner, sonner`, `package_dependencies_tailwind_merge, ...`, `package_dependencies_tailwindcss, tai...`, `package_dependencies_tailwindcss_vite...`, `package_dependencies_tw_animate_css, ...`, `package_dependencies_types_react, typ...`, `package_dependencies_types_react_dom,...`, `package_dependencies_vite, vite`, `package_dependencies_vitejs_plugin_re...`?**
  _High betweenness centrality (0.018) - this node is a cross-community bridge._
- **Why does `Button()` connect `resources_js_components_delete_user, ...` to `resources_js_components_nav_user_navu...`, `resources_js_components_ui_badge, res...`, `resources_js_components_app_header, r...`, `resources_js_components_alert_error, ...`?**
  _High betweenness centrality (0.016) - this node is a cross-community bridge._
- **What connects `$schema`, `style`, `rsc` to the rest of the system?**
  _190 weakly-connected nodes found - possible documentation gaps or missing edges._
- **Should `resources_js_components_delete_user, ...` be split into smaller, more focused modules?**
  _Cohesion score 0.05679824561403509 - nodes in this community are weakly interconnected._
- **Should `app_actions_fortify_createnewuser, ap...` be split into smaller, more focused modules?**
  _Cohesion score 0.06077694235588972 - nodes in this community are weakly interconnected._
- **Should `composer_scripts, composer_scripts_ci...` be split into smaller, more focused modules?**
  _Cohesion score 0.05398110661268556 - nodes in this community are weakly interconnected._