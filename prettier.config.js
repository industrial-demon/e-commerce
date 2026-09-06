/**
 * @see https://prettier.io/docs/configuration
 * @type {import("prettier").Config}
 */

const config = {
    printWidth: 80,
    tabWidth: 4,
    plugins: ["prettier-plugin-blade", "prettier-plugin-tailwindcss"],
    overrides: [
        {
            files: ["*.blade.php"],
            options: {
                parser: "blade",
                htmlWhitespaceSensitivity: "ignore",
                singleAttributePerLine: true ,
            },
        },
    ],
};

export default config;
