import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

export default {
  content: [
    './app/Filament/**/*.php',
    './app/Http/Controllers/**/*.php',
    './app/Models/**/*.php',
    './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {},
  },
  plugins: [forms, typography],
};
