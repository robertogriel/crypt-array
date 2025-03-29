# Changelog

## v2.0.0 - March 2025

- Refactored the entire Crypto class to use modern PHP 7.4+ features
- Strongly typed properties and method arguments
- Removed legacy methods `getEncrypted()` and `getDecrypted()`
- Introduced `encrypt()` and `decrypt()` methods that auto-detect string or array
- Optional Base64 encoding as a third boolean constructor parameter
- Improved exception handling with clear messages on failures
- Replaced use of `implode`/`explode` logic for array handling
- Supported encryption/decryption of:
    - Strings (including empty)
    - Associative arrays (including empty, large, and special characters)
- Pest test suite with full unit coverage
- Clean separation of internal logic (`encryptValue`, `decryptValue`)
- Updated `composer.json` with PSR-4 autoloading and PHP 7.4+ requirement
- Updated `README.md` with modern usage, migration guide and examples

---

## v1.1 - April, 2022

- Added the base64 option
- Refactored the class to satisfy Composer

---

## v1.0 - December, 2019

- Initial public release
