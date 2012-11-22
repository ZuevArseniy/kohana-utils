<?php
    abstract class Controller_Ajax extends Controller {

        public function before()
        {
            parent::before();
            if(!$this->request->is_ajax())
            {
                throw new HTTP_Exception_500("the request is not a ajax one");
            }
        }

    }