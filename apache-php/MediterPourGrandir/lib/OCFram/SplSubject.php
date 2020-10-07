<?php
namespace OCFram;

	interface SplSubject {
 /**
         * Attach an SplObserve
         * @param SplObserver $observer
         * @return void 
         */
        public function attach (SplObserver $observer);

        /**
         * Detach an observer
         * @param SplObserver $observe
         * @return void
         */
        public function detach (SplObserver $observer);

        /**
         * Notify an observer
         * @return void 
         */
        public function notify ($userExempt);
}