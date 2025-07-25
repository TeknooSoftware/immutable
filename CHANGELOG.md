# Teknoo Software - Immutable library - Change Log

## [3.0.21] - 2025-07-26
### Stable Release
- Update dev libraries requirements

## [3.0.20] - 2025-04-24
### Stable Release
- Update to PHPStan 2
- Require PHP 8.3

## [3.0.19] - 2025-02-07
### Stable Release
- Update dev lib requirements
  - Require Symfony libraries 6.4 or 7.2
  - Update to PHPUnit 12
- Drop support of PHP 8.2
  - The library stay usable with PHP 8.2, without any waranties and tests
  - In the next major release, Support of PHP 8.2 will be dropped

## [3.0.18] - 2024-10-06
### Stable Release
- Update dev lib requirements

## [3.0.17] - 2023-11-29
### Stable Release
- Update dev lib requirements

## [3.0.16] - 2023-05-15
### Stable Release
- Update dev lib requirements
- Update copyrights

## [3.0.15] - 2023-04-16
### Stable Release
- Update dev lib requirements
- Support PHPUnit 10.1+
- Migrate phpunit.xml

## [3.0.14] - 2023-02-11
### Stable Release
- Remove phpcpd and upgrade phpunit.xml

## [3.0.13] - 2023-02-03
### Stable Release
- Update dev libs to support PHPUnit 10 and remove unused phploc

## [3.0.12] - 2022-12-19
### Stable Release
- Some QA fix

## [3.0.1] - 2022-03-08
### Stable Release
- `ImmutableTrait::__set` and `ImmutableTrait::__unset` are final

## [3.0.0] - 2022-02-08
### Stable Release
- Require PHP 8.1 or later
- Switch to readonly property to detect reconstructed object

## [2.0.12] - 2021-12-12
### Stable Release
- Remove unused QA tool

## [2.0.11] - 2021-12-03
### Stable Release
- Fix some deprecated with PHP 8.1

## [2.0.10] - 2021-11-01
### Stable Release
- Switch to PHPStan 1.0

## [2.0.9] - 2021-06-27
### Stable Release
- Update documents and dev libs requirements

## [2.0.8] - 2021-05-31
### Stable Release
- Minor version about libs requirements

## [2.0.7] - 2021-04-23
### Stable Release
- Complete tests about PHP8
- QA

## [2.0.6] - 2020-12-03
### Stable Release
- Official Support of PHP8

## [2.0.5] - 2020-10-12
### Stable Release
- Prepare library to support also PHP8.

## [2.0.4] - 2020-09-18
### Stable Release
- Update QA and CI tools

## [2.0.3] - 2020-08-25
### Stable Release
### Update
- Update libs and dev libs requirements

## [2.0.2] - 2020-07-17
### Stable Release
### Change
- Add travis run also with lowest dependencies.

## [2.0.1] - 2020-03-01
### Stable Release
### Changes
- Update dev tools, migrate to PHPUnit 9.0, phploc 6.0, phpcpd 5.0
- Change makefile behavior for test target to auto enable xdebug to check coverage

## [2.0.0] - 2020-01-14
### Stable Release

## [2.0.0-beta6] - 2019-12-30
### Change
- Update copyright

## [2.0.0-beta5] - 2019-12-23
### Change
- Fix Make definition tools

## [2.0.0-beta4] - 2019-12-23
### Change
- QA Fix spotted by PHPStan

## [2.0.0-beta3] - 2019-11-28
### Change
- Enable PHPStan in QA Tools

## [2.0.0-beta2] - 2019-11-28
### Change
- Most methods have been updated to include type hints where applicable. Please check your extension points to make sure the function signatures are correct.
_ All files use strict typing. Please make sure to not rely on type coercion.

## [2.0.0-beta1] - 2019-11-27
### Change
- PHP 7.4 is the minimum required
- Switch to typed properties
- Remove some PHP useless DockBlocks

## [1.0.4] - 2019-10-24
### Release
- Maintenance release, QA and update dev vendors requirements

## [1.0.3] - 2019-06-09
### Release
- Maintenance release, upgrade composer dev requirement and libs

## [1.0.2] - 2019-02-10
### Release
- Remove support to PHP 7.1
- Switch to PHPUnit 8.0

## [1.0.1] - 2019-01-04
### Release
- Remove support to PHP 7.0 and add 7.3

## [1.0.0] - 2017-11-12
### Release
- First stable release, stabilization of the API.

## [0.0.3] - 2017-08-01
### Updated
- Update dev libraries used for this project and use now PHPUnit 6.2 for tests.

## [0.0.2] - 2017-02-15
### Fix
- Code style fix
- License file follow Github specs
- Add tools to checks QA, use `make qa` and `make test`, `make` to initalize the project, (or `composer update`).
- Update Travis to use this tool
- Fix QA Errors

## [0.0.1] - 2016-07-26
- First release

### Added
- Add api doc

## [0.0.1-beta1] - 2016-04-09
- First Beta

### Fixed
- Fix code style with cs-fixer

## [0.0.1-alpha1] - 2016-02-25
- First alpha

### Added
- ImmutableInterface
- ImmutableTrait with default constructor
- Tests
