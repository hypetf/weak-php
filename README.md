# Vulnerable PHP File Uploader

This is a vulnerable file uploader built with PHP, intended for educational purposes only.

**DISCLAIMER: Do not deploy this code in a production environment as it is highly insecure and can lead to serious security vulnerabilities.**

## Prerequisites

To run this project locally you will need to have PHP installed.
This project was developed using PHP v8.2

-   [PHP](https://www.php.net/downloads.php)

I've also used Burp Suite Community to inject the webshell

-   [Burp Suite](https://portswigger.net/burp/communitydownload)

## Setup

1. Clone the repository inside your project folder.

```sh
git clone https://github.com/hypetf/weak-php.git
```

2. Navigate to your project folder on your cli and serve the website locally with the following command:

```sh
php -S 127.0.0.1:8000
```

3. Open on `127.0.0.1:8000`

## Security Considerations

This vulnerable file uploader has intentionally weak security checks to demonstrate common vulnerabilities. To improve the code and make it more secure

Possible vulnerabilities:

1. [Web shell upload via path traversal](https://portswigger.net/web-security/file-upload/lab-file-upload-web-shell-upload-via-path-traversal)
2. [Web shell upload via extension blacklist bypass](https://portswigger.net/web-security/file-upload/lab-file-upload-web-shell-upload-via-extension-blacklist-bypass)
3. [Web shell upload via obfuscated file extension](https://portswigger.net/web-security/file-upload/lab-file-upload-web-shell-upload-via-obfuscated-file-extension)
4. [Remote code execution via polygot web shell upload]()

#### **Note**: This vulnerable file uploader is solely intended for educational purposes to understand common security pitfalls and should not be used in any production environment. I've made this for my Ethical Hacking unit.
