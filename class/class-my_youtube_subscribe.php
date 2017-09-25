<?php

class My_Youtube_Subscribe {
    public static $instance;

    public static function getInstance()
    {
        if(self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __construct()
    {
        add_shortcode('youtube', [$this, 'create_button']);
    }

    public function create_button($arguments)
    {
        $attributes = shortcode_atts(['channel' => ''], $arguments);
        $channel = $attributes['channel'];
        return sprintf('
            <script src="https://apis.google.com/js/platform.js"></script>
            <div class="g-ytsubscribe" data-channel="%s" data-layout="default" data-count="default"></div>
        ', $channel);
    }
}

My_Youtube_Subscribe::getInstance();