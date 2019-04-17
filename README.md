# ch-test
Technical Test

To install node dependencies [Tailwind](https://tailwindcss.com):

```
npm install
```

Generate css (from `./webroot` directory):

```
./node_modules/.bin/tailwind build css/tailwind.css -o css/styles.css
```


Generate Composer Vendor and Autoload files:

```
composer dumpautoload -o
```