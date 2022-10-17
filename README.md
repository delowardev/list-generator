# List Generator

[![Project Status: Active – The project has reached a stable, usable state and is being actively developed.](https://www.repostatus.org/badges/latest/active.svg)](https://www.repostatus.org/#active)

Plugin for List Generator. All blocks will take place in this plugin.

```markdown
.
├── assets
│   ├── build
│   │   ├── js
│   │   │   ├── blocks.js
│   ├── js
│   │   ├── blocks
│   │   │   ├── example-block
│   │   │   |		├── index.js
│   │   ├── blocks.js
│   ├── .babelrc
│   ├── .eslintignore
│   ├── .eslintrc.json
│   ├── package.json
│   ├── package-lock.json
│   ├── webpack.config.js
├── inc
│   ├── classes
│   │   ├── class-assets.php
│   │   ├── class-plugin.php
│   │   ├── class-blocks.php
│   │   └── blocks
│   ├── helpers
│   │   ├── autoloader.php
│   │   └── custom-functions.php
│   └── traits
│       └── trait-singleton.php
└── list-generator.php
```


## Assets

Assets folder contains webpack setup and can be used for creating blocks or adding any other custom scripts like javascript for admin.

- Run `npm i` from `assets` folder to install required npm packages.
- Use `npm run dev` during development for assets.
- Use `npm run prod` for production.
- Use `npm run eslint:fix js/fileName.js` for fixing and linting eslint errors and warning.
