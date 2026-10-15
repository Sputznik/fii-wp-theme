<?php

class FII_METRIC_FILTER {

  /**
   * Checks if a given user agent string matches a known bot pattern.
   *
   * @param string $user_agent The HTTP user agent string to check.
   * @return bool true if a bot is detected, false otherwise.
   */
  public static function is_bot_user_agent( $user_agent ){

     // Treat empty user agents as automated/blocked traffic
    if( empty( $user_agent ) ){
      return true;
    }

    // The /i modifier handles case-insensitivity seamlessly.
    // The /x modifier ignores whitespace and newlines, allowing this clean layout.
    $bot_pattern = '/
        \b(bot|bots|crawler|crawlers|spider|spiders|scraper|scrapers|slurp)\b
        |googlebot
        |bingbot
        |yahoo! slurp
        |baiduspider
        |yandexbot
        |duckduckbot
        |applebot
        |ahrefsbot
        |semrushbot
        |mj12bot
        |dotbot
        |screaming frog
        |rogerbot
        |sistrix
        |bytespider
        |ccbot
        |gptbot
        |oai-searchbot
        |oai-adsbot
        |chatgpt-user
        |claudebot
        |claude-searchbot
        |claude-user
        |anthropic-ai
        |perplexitybot
        |perplexity-user
        |google-extended
        |googleother
        |meta-externalagent
        |meta-externalfetcher
        |facebookexternalhit
        |facebot
        |twitterbot
        |linkedinbot
        |slackbot
        |telegrambot
        |whatsapp
        |discordbot
        |embedly
        |quora link preview
        |chrome-lighthouse
        |lighthouse
        |pagespeed
        |gtmetrix
        |pingdom
        |uptimerobot
        |headlesschrome
        |phantomjs
        |selenium
        |playwright
        |puppeteer
        |curl
        |wget
        |python-requests
        |python-urllib
        |go-http-client
        |scrapy
        |httpclient
        |libwww-perl
        |okhttp
        |bytedance
        |bytebot
    /ix';

    return (bool) preg_match( $bot_pattern, $user_agent );
  }

}
