## 👨‍💻 Autor

<div align="center">
  <img src="https://avatars.githubusercontent.com/ninomiquelino" width="100" height="100" style="border-radius: 50%">
  <br>
  <strong>Onivaldo Miquelino</strong>
  <br>
  <a href="https://github.com/ninomiquelino">@ninomiquelino</a>
</div>

---

# 🤖 Bot Scanner: Device Detector PHP Demo

![Made with PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white)
![Frontend JavaScript](https://img.shields.io/badge/Frontend-JavaScript-F7DF1E?logo=javascript&logoColor=black)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-38B2AC?logo=tailwindcss&logoColor=white)
![License MIT](https://img.shields.io/badge/License-MIT-green)
![Status Stable](https://img.shields.io/badge/Status-Stable-success)
![Version 1.0.0](https://img.shields.io/badge/Version-1.0.0-blue)
![GitHub stars](https://img.shields.io/github/stars/NinoMiquelino/bot-detector-php?style=social)
![GitHub forks](https://img.shields.io/github/forks/NinoMiquelino/bot-detector-php?style=social)
![GitHub issues](https://img.shields.io/github/issues/NinoMiquelino/bot-detector-php)

Este projeto demonstra como utilizar a poderosa biblioteca **`matomo/device-detector`** em um backend PHP para analisar o `User-Agent` de uma requisição e identificar se a fonte do tráfego é um navegador humano ou um bot (como Googlebot, Bingbot, Scrapers, etc.).

A aplicação é útil para aprimorar a lógica de segurança e análise de tráfego, permitindo diferenciar bots de tráfego orgânico.

---

## 🔎 Funcionalidades

* **Detecção Precisa:** Utiliza o extenso banco de dados de User-Agents do `DeviceDetector` para identificar mais de 800 bots e crawlers diferentes.
* **Informação Detalhada:** Se um bot for detectado, o sistema retorna o Nome, Categoria (SEO, Crawler, etc.) e o Produtor.
* **Simplicidade:** Frontend minimalista com **Tailwind CSS** e JavaScript que apenas envia o `User-Agent` do navegador para análise no backend.
* **PHP Nativo:** Implementação da lógica de análise no servidor (PHP).

---

## 🧠 Tecnologias utilizadas

* **Backend:** PHP 7.4+
    * `matomo/device-detector` (Biblioteca principal para detecção)
    * Composer (Gerenciador de dependências)
* **Frontend:** HTML5 e JavaScript Vanilla
* **Estilização:** Tailwind CSS (via CDN)

---

## 🧩 Estrutura do Projeto
```
bot-detector-php/
├── index.html
├── api.php
├── README.md
├── .gitignore
└── LICENSE
```
---

## ⚙️ Configuração e Instalação

### Pré-requisitos

1.  Um ambiente de servidor web com PHP.
2.  **Composer** instalado globalmente.

### 1. Clonar o Repositório

```bash
git clone https://github.com/ninomiquelino/bot-detector-php.git
```

2. Instalar a Dependência PHP
​Utilize o Composer para instalar a biblioteca matomo/device-detector:

```bash
composer require matomo/device-detector
```

3. Executar o Servidor
​Utilize o servidor embutido do PHP para testes (a partir da raiz do projeto):

```bash
php -S localhost:8001
```

​• Acesse: O frontend estará disponível em http://localhost:8001/public/index.html.

​4. Configurar o Endpoint da API
​Certifique-se de que a constante API_URL no arquivo public/index.html aponte corretamente para o seu backend:

// public/index.html
const API_URL = 'http://localhost:8001/src/api.php'; 

---

## 📝 Instruções de Uso

​Abra o index.html no seu navegador.
​Clique no botão Verificar Bot.
​O frontend fará uma requisição POST ao api.php. O PHP lerá o User-Agent do seu navegador.
​O resultado será exibido no componente de status:
​Se for um navegador comum (o seu): O status mostrará "Bot NÃO detectado" em verde.
​Para testar a detecção de bot: Você precisaria forçar o envio de um User-Agent de bot (ex: usando ferramentas como Postman, cURL ou extensões de navegador) para o endpoint api.php.
​
➡️ Exemplo de Teste de Bot (Usando cURL)
​Para provar que a detecção funciona, você pode simular uma requisição do Googlebot diretamente para o api.php no seu terminal, substituindo a URL:

```bash
curl -X POST \
  -H "Content-Type: application/json" \
  -H "User-Agent: Mozilla/5.0 (compatible; Googlebot/2.1; +[http://www.google.com/bot.html](http://www.google.com/bot.html))" \
  http://localhost:8001/src/api.php
```

A resposta JSON do backend deverá confirmar a detecção do Googlebot.

---

## 🤝 Contribuições
Contribuições são sempre bem-vindas!  
Sinta-se à vontade para abrir uma [*issue*](https://github.com/NinoMiquelino/bot-detector-php/issues) com sugestões ou enviar um [*pull request*](https://github.com/NinoMiquelino/bot-detector-php/pulls) com melhorias.

---

## 💬 Contato
📧 [Entre em contato pelo LinkedIn](https://www.linkedin.com/in/onivaldomiquelino/)  
💻 Desenvolvido por **Onivaldo Miquelino**

---
