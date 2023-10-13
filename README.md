# Formatic
Formatic is more than just a form builder. It's a powerful self-hosted solution designed specifically as a Statamic Starter Kit. With Formatic, you have all the tools you need to create outstanding forms that meet your unique design needs.

Our user-friendly interface and multiple design options make it easy for you to customize your forms to perfection. Whether you want to create a full-page form, a form split by sections with cards, or a multi-step form, Formatic has got you covered.

Formatic is a truly versatile tool that supports traditional text, responsive images, embedding videos, and even YouTube links. This flexibility allows you to create dynamic and engaging forms for any project.
It empowers you to own your data, host anywhere, and integrate with virtually anything. With a one-click install, you have a full-fledged form builder at your fingertips.

But it doesn't stop there. Formatic seamlessly integrates with Zapier and Pipedream, opening up a world of possibilities for integration with a wide range of applications. We've also included password protection features, so you can control access to your forms and ensure they are only used by authorized parties.

One of the standout features of Formatic is its ability to seamlessly integrate with your existing Statamic website. Even if your website is built using different technologies, you can easily incorporate Formatic into a new Statamic project and achieve a cohesive blend with your existing website design.

## Features
Here are just a few key features that make Formatic a game-changer:

- Light/Dark Mode: Cater to user preferences with an easy toggle between light and dark themes.
- 12 Predefined themes: Customize the look of your form with our predefined themes, or create your own with CSS variables and Tailwind CSS.
- 15 Designed Components: Each component is designed with accessibility in mind and fully customizable to suit your needs.
- 3 Form design options: Choose between Full Page, Split by Sections with Cards, and Multi Step form.
- Live validation: Leverage Laravel and Alpine.js for real-time form validation.
- Password Protected: Secure your forms with password protection.
- Prebuilt UI kit: Use our UI kit with Blade Components that are easy to customize and extend.
- Email Templates: Easily communicate with users using our email templates.

## Your Self-Hosted Alternative to Typeform and Google Forms

Tired of feeling tethered to major form builders like Typeform and Google Forms? Welcome to the liberating world of self-hosting with Formatic. We're not just another cog in the wheel of form builders. Formatic is your passport to data sovereignty, your gateway to GDPR conformity, and your ticket to a more secure digital atmosphere. Our tool guarantees that all your data remains securely stowed on your own servers without any extraneous tracking. In essence, you’re not simply acquiring a form builder, you’re investing in tranquility – the assurance that you're adhering to the stringent data protection norms that many of our esteemed clients prize. With Formatic, you're not merely creating forms, you're cultivating confidence.

The best part? You won't be sacrificing any functionality. Quite the contrary. You'll be harnessing a robust, feature-packed tool that can stand shoulder-to-shoulder with any leading form builder on the market. We like to think of it as savoring the best of both worlds. So, if you're prepared to shake off the shackles of mainstream form builders and seize control of your data, it's high time you experienced Formatic. You just got Lucky.

## Installation
Installing Formatic is a breeze. Simply follow the [Installing a starter kit](https://statamic.dev/starter-kits/installing-a-starter-kit) guide from Statamic. Please note that you will need to be running **Statamic 4.x**.

### Installing into an existing site
```bash
php please starter-kit:install lucky-media/formatic
```

### Installing via the Statamic CLI Tool
If you prefer using the [Statamic’s CLI Tool](https://github.com/statamic/cli), you can create a new Statamic installation with Formatic in just one line of code:
```bash
statamic new my-site lucky-media/formatic
```

## Styling
When it comes to styling, Formatic makes it easy for you to tailor the design to your preferences. We use TailwindCSS, so you can simply edit the `tailwind.config.js` file to customize the colors and design elements of your form.

## Compiling Assets
To compile all the assets, we use Vite with [Laravel](https://laravel.com/docs/9.x/vite). After installing the starter kit, make sure to run the following commands:
- `npm install` - to install all the required dependencies.
- `npm run dev` - to run in development mode.
- `npm run build` - to compile assets for production.

## Commercial addon
Please note that Formatic is a commercial starter kit. To use it in your project, you must purchase a license via the [Statamic Marketplace](https://statamic.com/starter-kits/your-company-name/formatic).

## 🐞 Bugs and 💡 Feature Requests
If you have any bugs to report or feature requests, please visit the issues tab in our repository.

## Credits
Formatic is proudly brought to you by the talented team at [Lucky Media](https://www.luckymedia.dev/). We are passionate about leveraging technology to create high-performing websites and applications that live up to the hype. If you have any projects in mind, feel free to contact us.

We are grateful to the creators and contributors of the following packages that have made Formatic a reality:
- Statamic
- Tailwind CSS
- Alpine.js
