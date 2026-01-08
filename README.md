# GitHub User Activity CLI

A lightweight, performant Command Line Interface (CLI) tool built with **Native PHP** to fetch and display recent activity for any GitHub user using the GitHub REST API.

This project demonstrates the consumption of third-party APIs, response parsing, and performance optimization through a custom caching mechanism, all without relying on external frameworks.

## 🚀 Features

-   **Activity Tracking**: Fetches recent events including Pushes, Issue creation, Stars, and Pull Requests.
-   **Performance Optimization**: Implements a **File-based Caching System** to store API responses, minimizing network requests and avoiding API rate limits.
-   **Clean Output**: Formats complex JSON data into human-readable terminal output.
-   **Error Handling**: Robust handling of invalid usernames, network errors, and API restrictions.

## 🛠️ Technical Highlights

-   **Language**: PHP 8.2+
-   **Architecture**:
    -   **Service-Oriented**: Logic is decoupled into `GithubApiClient` (Data Fetching), `ActivityFormatter` (Presentation), and `CacheManager` (Persistence).
    -   **Caching Strategy**: Caches user data for a configurable time (default: 5 minutes) to optimize performance.
    -   **Native Implementation**: Uses PHP's native `cURL` library for HTTP requests, demonstrating core understanding of HTTP protocols.

## 📂 Project Structure

```text
├── src/
│   ├── GithubApiClient.php   # Handles HTTP requests to GitHub API
│   ├── ActivityFormatter.php # Formats event data for display
│   └── CacheManager.php      # Manages file-based caching logic
├── cache/                    # Directory for storing cached JSON responses
├── App.php                   # Main entry point (CLI Handler)
├── autoload.php              # Custom autoloader implementation
└── README.md
