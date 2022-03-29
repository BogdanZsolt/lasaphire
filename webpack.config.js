const currentTask = process.env.npm_lifecycle_event;
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

let imagesConfig = {
  test: /\.(jpg|png|jpeg)$/,
  type: "asset/resource",
  generator: {
    filename: "images/[name][ext]",
  },
};

let fontsConfig = {
  test: /\.(woff|woff2|eot|ttf|otf)$/,
  type: "asset/resource",
  generator: {
    filename: "fonts/[name][ext]",
  },
};

let svgConfig = {
  test: /\.svg$/,
  type: "asset/resource",
  generator: {
    filename: "icons/[name][ext]",
  },
};

let cssConfig = {
  test: /\.css$/,
  use: [
    MiniCssExtractPlugin.loader,
    "css-loader",
    {
      loader: "postcss-loader",
      options: {
        postcssOptions: {
          plugins: [require("postcss-preset-env")],
        },
      },
    },
  ],
};

let sassConfig = {
  test: /\.(s[ac]|c)ss$/,
  use: [
    MiniCssExtractPlugin.loader,
    "css-loader",
    "sass-loader",
    "postcss-loader",
  ],
};

let config = {
  entry: {
    index: path.resolve(__dirname, "src/index.js"),
    admin: path.resolve(__dirname, "src/main-admin.js"),
  },
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "./assets"),
    clean: true,
  },
  module: {
    rules: [cssConfig, sassConfig, imagesConfig, fontsConfig, svgConfig],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "[name].css",
    }),
  ],
};

if (currentTask === "dev") {
  (config.mode = "development"),
    (config.devtool = "source-map"),
    (config.watch = true),
    (config.watchOptions = {
      ignored: /node_modules/,
    });
}

if (currentTask === "build") {
  (config.mode = "production"),
    config.module.rules.push({
      test: /\.js$/,
      exclude: /node_modules/,
      use: {
        loader: "babel-loader",
        options: {
          presets: ["@babel/preset-env"],
          plugins: [
            "@babel/plugin-proposal-class-properties",
            "@babel/transform-runtime",
          ],
        },
      },
    });
}

module.exports = config;
