module.exports = {
  darkMode: 'class',
  content: [
    "./header.php",
    "./footer.php",
    "./index.php",
    "./front-page.php",
    "./404.php",
    "./resources/**/*.php",
    // './woocommerce/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: "#FFD600",
      },
    },
  },
  variants: {
    extend: {},
  },
  corePlugins: {
    container: false,
  },
  plugins: [
    function ({ addComponents }) {
      addComponents({
        ".container": {
          width: "100%",
          marginLeft: "auto",
          marginRight: "auto",
          // paddingLeft: '2rem',
          // paddingRight: '2rem',
          "@screen sm": {
            maxWidth: "640px",
          },
          "@screen md": {
            maxWidth: "768px",
          },
          "@screen lg": {
            maxWidth: "80%",
          },
          "@screen xl": {
            maxWidth: "80%",
          },
        },
      });
    },
  ],
};
