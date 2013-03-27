<?php
# $Id$
# PHPlot test: Plot auto-range test
# This is a parameterized test. See the script named at the bottom for details.
$tp = array(
  'subtitle' => 'Decimal tick step (1x): check edge, expecting step=5',
  'min' => 0,              # Lowest data value
  'max' => 49,             # Highest data value
  'adjust_mode' => 'T',    # Range adjust mode: 'T', 'R', or 'I'
  'adjust_amount' => 0,    #  % of range for adjustment
  'tick_mode' => 'decimal', # Tick selection mode
  );
require 'range-auto.php';
