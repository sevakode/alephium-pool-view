
# Alephium Mining Pool

This project is an Alephium mining pool implementation, designed to provide a robust and efficient mining solution for the Alephium blockchain. The mining pool allows miners to contribute their computing power and share the rewards based on their contribution.

## Features

- User-friendly web interface for monitoring mining statistics and performance
- Telegram bot integration for easy interaction and notifications
- Real-time updates on pool hashrate, miner hashrate, and rewards
- Detailed statistics and charts for analyzing mining performance
- Secure and efficient payment system for distributing rewards to miners
- Customizable pool settings and configurations

## Technologies Used

- PHP Laravel framework for backend development
- MySQL database for storing miner and pool data
- Alephium Node.js API for interacting with the Alephium blockchain
- Telegram Bot API for integrating the Telegram bot functionality
- Bootstrap and custom CSS for frontend styling
- jQuery and Ajax for dynamic updates and interactivity

## Implementation Highlights

- **Farmer Controller**: The `FarmerController` handles the main functionality of the mining pool. It retrieves pool statistics, miner balances, and hashrate information using the `BotController` and renders the appropriate views.

- **Bot Controller**: The `BotController` manages the Telegram bot integration. It handles incoming messages, processes commands, and sends notifications to miners. It interacts with the Alephium Node.js API to retrieve blockchain data and update miner statistics.

- **Node Service**: The `NodeService` is responsible for communicating with the Alephium Node.js API. It provides methods for retrieving miner balances, UTXOs, and hashrate information.

- **Telegram Service**: The `TelegramService` handles the communication with the Telegram Bot API. It sends messages and notifications to miners and processes incoming commands from the Telegram bot.

- **Database Models**: The project utilizes Laravel's Eloquent ORM for database management. The `Farmer` model represents miners and stores their addresses and Telegram IDs. The `Share` model represents the shares submitted by miners and is used for calculating rewards.

- **Frontend**: The web interface is built using Laravel's Blade templating engine. It utilizes Bootstrap for responsive design and custom CSS for styling. jQuery and Ajax are used for dynamic updates and interactivity, providing a seamless user experience.

## Setup and Installation

1. Clone the repository: `git clone https://github.com/sevakode/alephium-pool-view.git`
2. Install dependencies: `composer install`
3. Configure the database connection in `.env` file
4. Run database migrations: `php artisan migrate`
5. Start the development server: `php artisan serve`
6. Access the mining pool in your web browser at `http://localhost:8000`

## Future Enhancements

- Integration with additional payment gateways for seamless reward distribution
- Enhanced security measures to protect against attacks and unauthorized access
- Multilingual support for a wider audience
- Mobile app development for convenient access to mining statistics and notifications
