/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./src/Resources/**/*.blade.php", "./src/Resources/**/*.js"],

    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: "1.25rem",
                sm: "2rem",
                lg: "3rem",
                xl: "4rem",
                "2xl": "5rem",
            },
            screens: {
                sm: "640px",
                md: "768px",
                lg: "1024px",
                xl: "1280px",
                "2xl": "1440px",
            },
        },

        screens: {
            sm: "525px",
            md: "768px",
            lg: "1024px",
            xl: "1240px",
            "2xl": "1440px",
            1180: "1180px",
            1060: "1060px",
            991: "991px",
            868: "868px",
        },

        extend: {
                // Official NAVANIDHI NATURALS Brand Palette
                navanidhi: {
                    deepGreen:    '#0F4D2E',  // Primary Brand Forest Green
                    deepGreenDark:'#0A3520',  // Dark Forest Green Hover
                    sageGreen:    '#7BA05B',  // Accent Leaf Sage Green
                    earthBrown:   '#8B6F45',  // Warm Earth Terracotta / Soil
                    warmGold:     '#D4B381',  // Premium Ochre Gold Accent
                    warmGoldDark: '#BFA06E',  // Warm Gold Hover
                    lightBeige:   '#EADFCF',  // Warm Linen Canvas Background
                    offWhite:     '#F7F5EE',  // Clean Card Surface Background
                    black:        '#111111',  // Primary Typography Text
                    muted:        '#666666',  // Muted Body Text
                    border:       '#DCD3C3',  // Subtle Border
                },

                // Compatibility aliases (mapped to Navanidhi palette)
                elior: {
                    bg: "#EADFCF",            // Warm Botanical Linen Canvas
                    surface: "#F7F5EE",       // Subtle Linen Surface
                    card: "#ffffff",          // Pure White Card
                    charcoal: "#111111",      // Primary Text
                    slate: "#0F4D2E",         // Primary Forest Green
                    muted: "#666666",         // Muted Text
                    light: "#8e9f94",         // Light Text
                    border: "#DCD3C3",        // Linen Border
                    borderDark: "#0F4D2E",    // Dark Theme Border
                    botanical: "#0F4D2E",     // Primary Forest Green (#0F4D2E)
                    botanicalDark: "#0A3520", // Deep Evergreen (#0A3520)
                    botanicalLight: "#E8F2EC",// Soft Pale Green Tint
                    terracotta: "#D4B381",    // Primary Accent Warm Gold (#D4B381)
                    terracottaDark: "#BFA06E",// Rich Amber Gold Hover
                    terracottaLight: "#F7F5EE",// Soft Gold Tint
                    sand: "#EADFCF",          // Linen Canvas (#EADFCF)
                    gold: "#D4B381",          // Warm Gold (#D4B381)
                    goldDark: "#BFA06E",      // Gold Hover
                    goldLight: "#F7F5EE",     // Soft Gold Pill Tint
                },

                // Compatibility aliases
                navyBlue: "#0F4D2E",
                lightOrange: "#EADFCF",
                darkGreen: "#0F4D2E",
                darkBlue: "#0F4D2E",
                darkPink: "#D4B381",
            },

            fontFamily: {
                display: ["'Playfair Display'", "Georgia", "serif"],
                serif: ["'Playfair Display'", "Georgia", "serif"],
                playfair: ["'Playfair Display'", "Georgia", "serif"],
                sans: ["'Montserrat'", "system-ui", "-apple-system", "BlinkMacSystemFont", "'Segoe UI'", "sans-serif"],
                body: ["'Montserrat'", "system-ui", "-apple-system", "BlinkMacSystemFont", "'Segoe UI'", "sans-serif"],
                montserrat: ["'Montserrat'", "sans-serif"],
                poppins: ["'Montserrat'", "sans-serif"],
                dmserif: ["'Playfair Display'", "Georgia", "serif"],
            },

            letterSpacing: {
                widest: ".2em",
                ultra: ".25em",
            },

            boxShadow: {
                'navanidhi-subtle': '0 2px 12px -2px rgba(15, 77, 46, 0.06)',
                'navanidhi-card': '0 10px 30px -5px rgba(15, 77, 46, 0.08)',
                'navanidhi-hover': '0 20px 40px -10px rgba(15, 77, 46, 0.14)',
                'navanidhi-gold': '0 8px 24px -4px rgba(212, 179, 129, 0.35)',
                'elior-subtle': '0 2px 12px -2px rgba(15, 77, 46, 0.06)',
                'elior-card': '0 10px 30px -5px rgba(15, 77, 46, 0.08)',
                'elior-hover': '0 20px 40px -10px rgba(15, 77, 46, 0.14)',
                'elior-gold': '0 8px 24px -4px rgba(212, 179, 129, 0.35)',
            },

            borderRadius: {
                'navanidhi-sm': '4px',
                'navanidhi': '8px',
                'navanidhi-lg': '12px',
                'navanidhi-pill': '9999px',
                'elior': '8px',
                'elior-lg': '12px',
                'elior-pill': '9999px',
            },

            keyframes: {
                marquee: {
                    '0%': { transform: 'translateX(0%)' },
                    '100%': { transform: 'translateX(-50%)' },
                },
            },

            animation: {
                marquee: 'marquee 30s linear infinite',
            },
        }
    },

    plugins: [],

    safelist: [
        {
            pattern: /icon-/,
        }
    ]
};
