<?php    
/* $Id$ */

//error_reporting(E_ALL);

/*
// Check if we are processing the form
if (! array_key_exists('submit', $_POST)) {
    echo "<p>This file is intended to be called from format_chart.php, the example-o-matic.".
         "Please <a href=\"format_chart.php\">click here</a> to try it.</p>";
    exit;
}    
*/

extract ($_GET, EXTR_OVERWRITE);
extract ($_POST, EXTR_OVERWRITE);


//Sample functions

//data-data as a function
if ($which_data_type =="function") { 
	//Put function here
	$dx = ".3";
	$max = 6.4;
	$maxi = $max/$dx;
	for ($i=0; $i<$maxi; $i++) {
		$a = 4;
		$x = $dx*$i;
		$data[$i] = array("", $x, $a*sin($x),$a*cos($x),$a*cos($x+1)); 	
	}
	$which_data_type = "data-data";
} 
// MBD, goes with data_sample3.php, $num_data_rows is set there
else if ($which_data_type == 'data-data-error') {
    for ($i = 0; $i < $num_data_rows; $i++)
        eval ("\$data[\$i] = \$data_row$i; ");
/*        
    header("Content: text/html");
    echo "<pre>";
    print_r ($data);
    echo "</pre>";
*/    
} else { 
	while (list($key, $val) = each($data_row0)) {
		$data[$key] = array($data_row0[$key],$data_row1[$key],$data_row2[$key],$data_row3[$key],$data_row4[$key]); 	
	}

}


////////////////////////////////////////////////

//Required Settings 
	include("../phplot.php");
	$graph = new PHPlot($xsize_in, $ysize_in);
	$graph->SetDataType($which_data_type);  // Must be first thing
    
	$graph->SetDataValues($data);

//Optional Settings (Don't need them) 

//	$graph->SetTitle("This is a\n\rmultiple line title\n\rspanning three lines.");
    $graph->SetTitle($title);
	$graph->SetXTitle($xlbl, $which_xtitle_pos);
	$graph->SetYTitle($ylbl, $which_ytitle_pos);
	$graph->SetLegend(array("A","Bee","Cee","Dee"));
    
	$graph->SetFileFormat($which_fileformat);
	$graph->SetPlotType($which_plot_type);
    
	$graph->SetUseTTF($which_use_ttf);
    
	$graph->SetYTickIncrement($which_yti);
	$graph->SetXTickIncrement($which_xti);
   
    $graph->SetShading($which_shading);
    $graph->SetLineWidth($which_line_width);
    $graph->SetErrorBarLineWidth($which_errorbar_line_width);

	$graph->SetGridParams($which_draw_grid, $which_dashed_grid);
    $graph->SetTickLabelParams($which_xtick_label_pos, $which_ytick_label_pos, NULL, NULL);
    $graph->SetDataLabelParams($which_xdata_label_pos, $which_ydata_label_pos, NULL, NULL);
    
    $graph->SetXTickPos($which_xtick_pos);
    $graph->SetYTickPos($which_ytick_pos);

    // Please remember that angles other than 90 are taken as 0 when working fith fixed fonts.
    $graph->SetXLabelAngle($which_xlabel_angle);

	$graph->SetLineStyles(array("dashed","dashed","solid","solid"));
	$graph->SetPointShape($which_point);
    $graph->SetPointSize($which_point_size);
    $graph->SetDrawBrokenLines($which_broken);

    // Some forms in format_chart.php don't set this variable, suppress errors.
	@ $graph->SetErrorBarShape($which_error_type);
    
	$graph->SetXAxisPosition($which_xap);
    
	if ($maxy_in) { 
		if ($which_data_type = "text-data") { 
			$graph->SetPlotAreaWorld(0,$miny_in,count($data),$maxy_in);
		}
	}

/*
//Even more settings

	$graph->SetPlotAreaWorld(0,100,5.5,1000);
	$graph->SetPlotAreaWorld(0,-10,6,35);
	$graph->SetPlotAreaPixels(150,50,600,400);

    $graph->SetDataColors(
	        array("blue","green","yellow","red"),  //Data Colors
            array("black")							//Border Colors
    );  

    $graph->SetPlotBgColor(array(222,222,222));
    $graph->SetBackgroundColor(array(200,222,222)); //can use rgb values or "name" values
    $graph->SetTextColor("black");
    $graph->SetGridColor("black");
    $graph->SetLightGridColor(array(175,175,175));
    $graph->SetTickColor("black");
    $graph->SetTitleColor(array(0,0,0)); // Can be array or name
*/

      $graph->DrawGraph();
      
?>
