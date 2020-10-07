<?php
namespace OCFram;

	interface SplObserver {
  /**
         * Receive update from subject
         * @param SplSubject $subject
         * @return void 
         */
        public function update (SplSubject $subject, $userExempt);
}