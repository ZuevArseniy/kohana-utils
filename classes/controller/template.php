<?php defined('SYSPATH') or die('No direct script access.');

    abstract class Controller_Template extends Kohana_Controller_Template {

        protected $styles = array();

        protected $scripts = array();

        protected $title = array();

        protected $keywords = array();

        protected $description = array();
        /**
         * @var Auth Auth instance
         */
        public $auth;
        /**
         * @var Model_User current user
         */
        public $user;
        /**
         * @var Session Session instance
         */
        public $session;

        public function before()
        {
            parent::before();
            $this->auth = Auth::instance();
            $this->session = Session::instance();
            $this->user = $this->auth->get_user();
        }

        public function after()
        {

            $this->template->scripts = $this->scripts;
            $this->template->styles = $this->styles;
            $this->template->title = $this->title;
            $this->template->keywords = $this->keywords;
            $this->template->description = $this->description;
            parent::after();

        }

    }