<?php
# $Id$
# Background image - 5
# This is a parameterized test. See the script named at the bottom for details.
$tp = array(
  'suffix' => " (center tiled lines, dollars)",       # Title part 2
  'image1' => 'images/tile1.png', # Background image for entire graph, NULL for none
  'image2' => 'images/tile2.png', # Background image for plot area, NULL for none
  'mode1' => 'centeredtile',  # Graph background mode: centeredtile, tile, scale
  'mode2' => 'centeredtile',  # Plot area background mode: centeredtile, tile, scale
  'pabgnd' => True, # If image2 is null, draw a plot area background?
  );
require 'background.php';
