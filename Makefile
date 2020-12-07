### Variables

# Applications
COMPOSER ?= /usr/bin/env composer
DEPENDENCIES ?= lastest

### Helpers
all: clean depend

.PHONY: all

### Dependencies
depend:
ifeq ($(DEPENDENCIES), lowest)
	${COMPOSER} update --prefer-lowest --prefer-dist --no-interaction --ignore-platform-reqs;
else
	${COMPOSER} update --prefer-dist --no-interaction --ignore-platform-reqs;
endif

.PHONY: depend

### QA
qa: lint phpstan phpcs phpcpd

lint:
	find ./src -name "*.php" -exec /usr/bin/env php -l {} \; | grep "Parse error" > /dev/null && exit 1 || exit 0

phploc:
	vendor/bin/phploc src

phpstan:
	vendor/bin/phpstan analyse src --level max

phpcs:
	vendor/bin/phpcs --standard=PSR12 --extensions=php src/

phpcpd:
	vendor/bin/phpcpd src/

.PHONY: qa lint phploc phpstan phpcs phpcpd

### Testing
test:
	XDEBUG_MODE=coverage php -dzend_extension=xdebug.so -dxdebug.coverage_enable=1 vendor/bin/phpunit -c phpunit.xml -v --colors --coverage-text

.PHONY: test

### Cleaning
clean:
	rm -rf vendor

.PHONY: clean
