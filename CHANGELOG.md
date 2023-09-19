# Changelog

## 3.0.1 - 2023-09-19

### Changed
- New plugin icon.

## 3.0.0 - 2022-07-10

### Added
- Add checks for registering events for performance.

### Changed
- Now requires PHP `8.0.2+`.
- Now requires Craft `4.0.0+`.
- Rename base plugin methods.

## 2.0.2 - 2021-11-05

### Fixed
- Fix an error when viewing the plugin settings in the control panel.

## 2.0.1 - 2021-10-13

### Added
- Add a warning to table columns when being overridden by a config file.

### Fixed
- Fix settings not saving correctly, when saving from the control panel.

## 2.0.0 - 2021-08-25

### Added
- Add support for third-party elements.

### Changed
- Change settings structure to handle third-party elements.

## 1.0.6 - 2020-08-03

### Fixed
- Fix plugin errors not appearing.

## 1.0.5 - 2020-04-16

### Fixed
- Fix logging error `Call to undefined method setFileLogging()`.

## 1.0.4 - 2020-04-15

### Added
- Craft 3.4 compatibility.

### Changed
- File logging now checks if the overall Craft app uses file logging.
- Log files now only include `GET` and `POST` additional variables.

## 1.0.3 - 2019-02-10

### Fixed
- Ensure title is disabled (can’t be removed from element index).

## 1.0.2 - 2018-07-18

### Fixed
- Fix error that could occur when referencing a field no longer attached to an element.

## 1.0.1 - 2018-05-08

### Fixed
- Fix settings not saving from the control panel.

## 1.0.0 - 2018-04-26

- Initial release.
