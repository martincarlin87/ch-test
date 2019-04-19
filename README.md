# ch-test
Technical Test

### Installation and Setup

Execute the following commands:

To install node dependencies [Tailwind](https://tailwindcss.com):

```
cd ./webroot && npm install
```

Generate css:

```
./webroot/node_modules/.bin/tailwind build webroot/css/tailwind.css -o webroot/css/styles.css
```

To build css for production use (remove unused styles, minification etc.) run:

```
cd webroot && npm run build:css
```


Generate Composer Vendor and Autoload files:

```
cd ./webroot && composer dumpautoload -o
```

or, alternatively by using Docker:

```
docker run --rm -v $(pwd):/app composer/composer:latest dumpautoload -o
```

### Run Locally Using Docker

```
docker-compose up
```

Then visit http://localhost:80 or change the port number in `docker-compose.yml` if already in use

### Tests
From `webroot` directory:

```
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/WindTurbineTest
```

## Plan and Approach
Before starting my plan was to try and make something a bit more elegant than hardcoded variables for the various parameters such as the range (start and end), and the item values and their strings so that it could be more generic and flexible instead of a loop and some magic numbers.

I also wanted to make use of some PHP 7 features such as type declarations and return types for more robust code.

Another reason for this approach was that I wanted to try and introduce tests, so I wrote the solution with testing in mind and splitting logic up in to different methods. This is kind of the opposite order of TDD, but I wasn't sure what my structure would be at this stage in order to be able to write the tests first.

I knew that I wanted to try using Tailwind since I've never used it before but have been impressed with what I've seen of it and it makes for a change rather than opting for Bootstrap again.

To accompany Tailwind, I knew that I wanted to incorporate some tooling to remove unused styles and to minify the source which I have managed to do.

## Future Plans and Improvements
Some things that could be added are using a front end framework like Vue or React.

Another feature might be to use caching such as Redis so that a result is only calculated once and then cached instead of on every page load but this would only really be advantageous for much larger datasets.

It might also be an improvement to separate the logic for Wind Turbine items to a new class rather than it all being in one class.

Other things that could be done are using a framework with a standardised directory structure and to then make use of the MVC pattern and a templating language such as Blade.

An alternative approach to the filtering could be to use a data attribute for each li element rather than checking the text content (and having to remove the whitespace).

Finally, it would be nice and fairly straightforward to implement a form so that the various default values could be tweaked on the front end. It would be slightly tricker to customise the items array in 
terms of dynamically adding and removing items, but this is where something like Vue or React would shine.

The `styles.css` could also be removed from version control and built locally and on deployment but I've left it in to save generating it if anyone clones the repository.