<!--suppress HtmlDeprecatedAttribute -->
<h1 align="center">
	<!-- <img alt="Logo" src=".github/logo.png" width="200px" /> -->
  Suits Quotes
</h1>

<h3 align="center">
  API
</h3>

<p align="center">Fast, easy and free quotes from the Suits TV Show.</p>

<p align="center">
  <img alt="GitHub top language" src="https://img.shields.io/github/languages/top/maciejlewandowskii/SuitsQuotes">

  <a href="https://www.linkedin.com/in/eliasgcf/">
    <img alt="Made by" src="https://img.shields.io/badge/made%20by-maciejlewandowskii-gree">
  </a>

  <img alt="Repository size" src="https://img.shields.io/github/repo-size/maciejlewandowskii/SuitsQuotes">

  <a href="https://github.com/EliasGcf/readme-template/commits/master">
    <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/maciejlewandowskii/SuitsQuotes">
  </a>

  <a href="https://github.com/EliasGcf/readme-template/issues">
    <img alt="Repository issues" src="https://img.shields.io/github/issues/maciejlewandowskii/SuitsQuotes">
  </a>
</p>

<p align="center">
  <a href="#-about-the-project">About the project</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-technologies">Technologies</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-getting-started">Getting started</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-how-to-contribute">How to contribute</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
  <a href="#-license">License</a>
</p>

### Working Example:

> https://suitsquotes.000webhostapp.com/api/v1/quotes

## 👨🏻‍💻 About the project

This simple project allow you to get **Quote** from TV Series "Suits"

## 🚀 Technologies

Technologies that I used to develop this api

- [PHP 8.0](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [JSON](https://www.json.org/)

## 🌱 API Endpoints

This API has 2 Endpoints:

> **/api/v1/quotes**

or

> **/api/v1/quotes/img**
> >this Endpoint return a 1 quote but as image, you can also filter results.

You can search in Quotes by adding parameters to query:

> **/api/v1/quotes?season=1&episode=1**

Or search by author:

> **/api/v1/quotes?author=Mike%20Ross**

also you can search by quote:

> **/api/v1/quotes?quote=I%20am%20a%20man**

You can also set a limit (default is 10)

> **/api/v1/quotes?limit=2**

And if you want to get a random quote:

> **/api/v1/quotes?random=true**

## 👀 Requirements

- [PHP > 8](https://www.php.net/)
- Any Web Server

> I recommend use [Apache](https://httpd.apache.org/)

## 💻 Getting started

You can use ready example on this [address](https://suitsquotes.000webhostapp.com/api/v1/quotes)

or

**Clone the project and access the folder**

```bash
$ git clone https://github.com/maciejlewandowskii/SuitsQuotes.git && cd SuitsQuotes
```

**Follow the steps below**

```bash
# Install Apache Web Server
$ sudo apt-get install apache2

# Install PHP 8.0 on server
$ sudo apt install software-properties-common
$ sudo add-apt-repository ppa:ondrej/php
$ sudo apt update
$ sudo apt install php8.0 libapache2-mod-php8.0

# Restart Apache Web Server
$ sudo systemctl restart apache2

# Copy Files to /var/www/html
$ sudo copy -r * /var/www/html

# Well done, project is ready!
# Just open browser and put localhost/api/v1/quotes?limit=1&order=random
```


## 🤔 How to contribute

**Make a fork of this repository**

```bash
# Fork using GitHub official command line
# If you don't have the GitHub CLI, use the web site to do that.

$ gh repo fork maciejlewandowskii/SuitsQuotes
```

**Follow the steps below**

```bash
# Clone your fork
$ git clone your-fork-url && cd SuitsQuotes

# Create a branch with your feature
$ git checkout -b my-feature

# Make the commit with your changes
$ git commit -m 'feat: My new feature'

# Send the code to your remote branch
$ git push origin my-feature
```

After your pull request is merged, you can delete your branch

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

Made 💜 &nbsp;by Maciej Lewandowski 👋 &nbsp;[See my linkedin](https://www.linkedin.com/in/maciejlewandowskii/)