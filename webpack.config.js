// Import the original config from the @wordpress/scripts package
const defaultConfig = require("@wordpress/scripts/config/webpack.config");

module.exports = {
  ...defaultConfig,
  module: {
    ...defaultConfig.module,
    rules: [
      ...defaultConfig.module.rules,
      {
        test: /\.svg$/,
        type: "asset/resource",
        generator: {
          filename: "icons/[name].[ext]",
        }
      },
    ],
  },
};