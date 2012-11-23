<?php
    /**
     * extending the ORM class
     */
    class ORM extends Kohana_ORM {
        /**
         * @return ORM
         * @throws Kohana_Exception
         * Default delete() method overriding
         */
        public function delete()
        {
            if(!$this->_loaded)
                throw new Kohana_Exception('Cannot delete :model model because it is not loaded.', array(':model' => $this->_object_name));

            // Use primary key value
            $id = $this->pk();

            if($this->before_delete())//perform pre actions
            {
                // Delete the object
                DB::delete($this->_table_name)
                    ->where($this->_primary_key, '=', $id)
                    ->execute($this->_db);
            }

            $this->after_delete(); // perform after actions

            return $this->clear();
        }

        /**
         * @return bool
         * Dummy method. So we don't need to check the method existence
         * Should be overridden in child class
         */
        public function before_delete()
        {
            return TRUE;
        }

        /**
         * @return bool
         * Dummy method. So we don't need to check the method existence
         * Should be overridden in child class
         */
        public function after_delete()
        {
            return TRUE;
        }
    }