# GoRest API Automation Testing

This project contains automated tests for [GoRest API](https://gorest.co.in/) using **PHPUnit**, **Guzzle**, and **Dotenv**.

## 📦 Requirements

- PHP >= 8.1
- Composer
- PHPUnit (v10+)
- GoRest Personal Access Token

---

## ⚙️ Setup Instructions

1. **Clone the Repository**

```bash
git clone https://github.com/your-username/automation-api-testing.git
cd automation-api-testing

2. **Install Dependencies**

```bash
composer install

3. **Create .env File**

GOREST_TOKEN=your_gorest_token_here

4. **Run Tests**

```bash
vendor/bin/phpunit

or
```bash
vendor/bin/phpunit tests/Api/CreateUserTest.php

5. **Generate Coverage Report**

```bash
XDEBUG_MODE=coverage vendor/bin/phpunit --coverage-html coverage-report

open file in browser
```bash
coverage-report/index.html

 




