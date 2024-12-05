# Smartersoft Dev Test

## Description

A simple app for consuming Google's Books API v1.

## Setup

- Ensure you are using PHP v8.3.9+.
- Ensure the following PHP extensions are enabled:
  - curl
  - fileinfo
  - mbstring
  - openssl
  - **_Note - I haven't tested the effects of these not being here, they might not all be necessary._**
- Ensure you have a recent version of composer installed.
- `cd` into root directory.
- Create `.env` file and update params where necessary:
  ```bash
  cp .env.example .env
  ```
- Install dependencies:
  ```bash
  composer install
  ```

## Run Local

- `cd` into root directory.
- run local php server (from public directory):
  ```bash
  php -S 127.0.0.1:8000 -t ./public
  ```
- open link in brower

## Run Prod

-
