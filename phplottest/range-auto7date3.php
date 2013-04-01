<?php
# $Id$
# PHPlot test: Plot auto-range test
# This is a parameterized test. See the script named at the bottom for details.
$tp = array(
  'subtitle' => 'Date/time tick step - range below min_ticks',
  'min' => 0,              # Lowest data value
  'max' => 5,              # Highest data value
  'tick_mode' => 'date', # Tick selection mode
  );
require 'range-auto.php';
