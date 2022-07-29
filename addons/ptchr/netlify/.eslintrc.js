// module.exports = {
//     root: true,
//     env: {
//         browser: true,
//         node: true
//     },
//     parserOptions: {
//         parser: 'babel-eslint'
//     },
//     extends: ['prettier', 'prettier/vue', 'plugin:prettier/recommended'],
//     plugins: ['prettier'],
//     // add your custom rules here
//     rules: {
//         indent: ['error', 4],
//         'comma-dangle': ['error', 'never'],
//         'no-console': 'off'
//     }
// }

module.exports = {
    root: true,
    env: {
        browser: true
    },
    parserOptions: {
        parser: 'babel-eslint',
        sourceType: 'module'
    },
    extends: [
        'airbnb-base',
        'plugin:vue/recommended',
        'prettier/vue',
        'plugin:prettier/recommended'
    ],
    rules: {
        'comma-dangle': 'off',
        'class-methods-use-this': 'off',
        'import/no-unresolved': 'off',
        'import/extensions': 'off',
        'implicit-arrow-linebreak': 'off',
        'import/prefer-default-export': 'off',
        'vue/component-name-in-template-casing': [
            'error',
            'kebab-case',
            {
                ignores: []
            }
        ],
        'prettier/prettier': ['error', { singleQuote: true, endOfLine: 'auto' }]
    }
}
