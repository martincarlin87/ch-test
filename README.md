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


Generate Composer Vendor and Autoload files:

```
cd ./webroot && composer dumpautoload -o
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
Before starting my plan was to try and make something a bit more elegant than hardcoded variables for the range (start and end) and the values and their strings so that it could be
more generic and flexible.

I also wanted to make use of some PHP 7 features such as type declarations and return types.

Another reason for this approach was that I wanted to try and introduce tests, so I wrote the solution with testing in mind. This is kind of the opposite of TDD, but I wasn't sure what my structure 
would be at this stage in order to be able to write the tests first.

I knew that I wanted to try using Tailwind since I've never used it before but have been impressed with what I've seen of it and it makes for a change rather than opting for Bootstrap again.

## Future Plans and Improvements
Some things that could be added are using a front end framework like Vue or React.

Another feature might be to use caching such as Redis so that a result is only calculated once and then cached instead of on every page load.

It might also be an improvement to separate the logic for Wind Turbine items to a new class rather than it all being in one class.

Other things that could be done are using a framework with a standardised directory structure and to then make use of the MVC pattern and a templating language such as Blade.

An alternative approach to the filtering could be to use a data attribute for each li element rather than checking the text content (and having to remove the whitespace).

More tooling could be setup to use PostCSS to remove any unused styles and greatly reduce the file size, in addition to use Babel to compile ES6 to ES5.