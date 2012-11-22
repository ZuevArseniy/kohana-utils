<?php
    class Request extends Kohana_Request {
        /**
         * @return bool
         * Little wrapper, to check the robots requests
         */
        public function is_robot()
        {
            return $this->user_agent('robot') ? TRUE : FALSE;
        }
    }