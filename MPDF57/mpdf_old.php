<?php

// ******************************************************************************
// Software: mPDF, Unicode-HTML Free PDF generator                              *
// Version:  5.7     based on                                                   *
//           FPDF by Olivier PLATHEY                                            *
//           HTML2FPDF by Renato Coelho                                         *
// Date:     2013-07-14                                                         *
// Author:   Ian Back <ianb@bpm1.com>                                           *
// License:  GPL                                                                *
//                                                                              *
// Changes:  See changelog.txt                                                  *
// ******************************************************************************


define('mPDF_VERSION','5.7');

//Scale factor
define('_MPDFK', (72/25.4));

/*-- HTML-CSS --*/
define('AUTOFONT_CJK',1);
define('AUTOFONT_THAIVIET',2);
define('AUTOFONT_RTL',4);
define('AUTOFONT_INDIC',8);
define('AUTOFONT_ALL',15);

define('_BORDER_ALL',15);
define('_BORDER_TOP',8);
define('_BORDER_RIGHT',4);
define('_BORDER_BOTTOM',2);
define('_BORDER_LEFT',1);
/*-- END HTML-CSS --*/

if (!defined('_MPDF_PATH')) define('_MPDF_PATH', dirname(preg_replace('/\\\\/','/',__FILE__)) . '/');
if (!defined('_MPDF_URI')) define('_MPDF_URI',_MPDF_PATH);

require_once(_MPDF_PATH.'includes/functions.php');
require_once(_MPDF_PATH.'config_cp.php');

if (!defined('_JPGRAPH_PATH')) define("_JPGRAPH_PATH", _MPDF_PATH.'jpgraph/'); 

if (!defined('_MPDF_TEMP_PATH')) define("_MPDF_TEMP_PATH", _MPDF_PATH.'tmp/');

if (!defined('_MPDF_TTFONTPATH')) { define('_MPDF_TTFONTPATH',_MPDF_PATH.'ttfonts/'); }
if (!defined('_MPDF_TTFONTDATAPATH')) { define('_MPDF_TTFONTDATAPATH',_MPDF_PATH.'ttfontdata/'); }

$errorlevel=error_reporting();
$errorlevel=error_reporting($errorlevel & ~E_NOTICE);

//error_reporting(E_ALL);

if(function_exists("date_default_timezone_set")) {
    if (ini_get("date.timezone")=="") { date_default_timezone_set("Europe/London"); }
}
if (!function_exists("mb_strlen")) { die("Error - mPDF requires mb_string functions. Ensure that PHP is compiled with php_mbstring.dll enabled."); }

if (!defined('PHP_VERSION_ID')) {
    $version = explode('.', PHP_VERSION);
    define('PHP_VERSION_ID', ($version[0] * 10000 + $version[1] * 100 + $version[2]));
}
// Machine dependent number of bytes used to pack "double" into binary (used in cacheTables)
$test = pack("d", 134455.474557333333666);
define("_DSIZE", strlen($test));

class mPDF
{

///////////////////////////////
// EXTERNAL (PUBLIC) VARIABLES
// Define these in config.php
///////////////////////////////
var $CJKforceend;   // mPDF 5.6.40
// mPDF 5.6.34
var $h2bookmarks;
var $h2toc;
var $decimal_align; // mPDF 5.6.13
var $margBuffer;    // mPDF 5.4.04
var $splitTableBorderWidth; // mPDF 5.4.16

var $cacheTables;
var $bookmarkStyles;
var $useActiveForms;

var $repackageTTF;
var $allowCJKorphans;
var $allowCJKoverflow;

var $useKerning;
var $restrictColorSpace;
var $bleedMargin;
var $crossMarkMargin;
var $cropMarkMargin;
var $cropMarkLength;
var $nonPrintMargin;

var $PDFX;
var $PDFXauto;

var $PDFA;
var $PDFAauto;
var $ICCProfile;

var $printers_info;
var $iterationCounter;
var $smCapsScale;
var $smCapsStretch;

var $backupSubsFont;
var $backupSIPFont;
var $debugfonts;
var $useAdobeCJK;
var $percentSubset;
var $maxTTFFilesize;
var $BMPonly;

var $tableMinSizePriority;

var $dpi;
var $watermarkImgAlphaBlend;
var $watermarkImgBehind;
var $justifyB4br;
var $packTableData;
var $pgsIns;
var $simpleTables;
var $enableImports;

var $debug;
var $showStats;
var $setAutoTopMargin;
var $setAutoBottomMargin;
var $autoMarginPadding;
var $collapseBlockMargins;
var $falseBoldWeight;
var $normalLineheight;
var $progressBar;
var $incrementFPR1;
var $incrementFPR2;
var $incrementFPR3;
var $incrementFPR4;

var $SHYlang;
var $SHYleftmin;
var $SHYrightmin;
var $SHYcharmin;
var $SHYcharmax;
var $SHYlanguages;
// PageNumber Conditional Text
var $pagenumPrefix;
var $pagenumSuffix;
var $nbpgPrefix;
var $nbpgSuffix;
var $showImageErrors;
var $allow_output_buffering;
var $autoPadding;
var $useGraphs;
var $autoFontGroupSize;
var $tabSpaces;
var $useLang;
var $restoreBlockPagebreaks;
var $watermarkTextAlpha;
var $watermarkImageAlpha;
var $watermark_size;
var $watermark_pos;
var $annotSize;
var $annotMargin;
var $annotOpacity;
var $title2annots;
var $keepColumns;
var $keep_table_proportions;
var $ignore_table_widths;
var $ignore_table_percents;
var $list_align_style;
var $list_number_suffix;
var $useSubstitutions;
var $CSSselectMedia;

var $forcePortraitHeaders;
var $forcePortraitMargins;
var $displayDefaultOrientation;
var $ignore_invalid_utf8;
var $allowedCSStags;
var $onlyCoreFonts;
var $allow_charset_conversion;

var $jSWord;
var $jSmaxChar;
var $jSmaxCharLast;
var $jSmaxWordLast;

var $max_colH_correction;


var $table_error_report;
var $table_error_report_param;
var $biDirectional;
var $text_input_as_HTML; 
var $anchor2Bookmark;
var $list_indent_first_level;
var $shrink_tables_to_fit;

var $allow_html_optional_endtags;

var $img_dpi;

var $defaultheaderfontsize;
var $defaultheaderfontstyle;
var $defaultheaderline;
var $defaultfooterfontsize;
var $defaultfooterfontstyle;
var $defaultfooterline;
var $header_line_spacing;
var $footer_line_spacing;

var $pregUHCchars;
var $pregSJISchars;
var $pregCJKchars;
var $pregASCIIchars1;
var $pregASCIIchars2;
var $pregASCIIchars3;
var $pregVIETchars;
var $pregVIETPluschars;

var $pregRTLchars;
var $pregHEBchars;
var $pregARABICchars;
var $pregNonARABICchars;
// INDIC
var $pregHIchars;
var $pregBNchars;
var $pregPAchars;
var $pregGUchars;
var $pregORchars;
var $pregTAchars;
var $pregTEchars;
var $pregKNchars;
var $pregMLchars;
var $pregSHchars;
var $pregINDextra;

var $mirrorMargins;
var $default_lineheight_correction;
var $watermarkText;
var $watermarkImage;
var $showWatermarkText;
var $showWatermarkImage;

var $fontsizes;

// Aliases for backward compatability
var $UnvalidatedText;   // alias = $watermarkText
var $TopicIsUnvalidated;    // alias = $showWatermarkText
var $useOddEven;        // alias = $mirrorMargins
var $useSubstitutionsMB;    // alias = $useSubstitutions



//////////////////////
// CLASS OBJECTS
//////////////////////
var $cssmgr;
var $grad;
var $bmp;
var $wmf;
var $tocontents;
var $form;
var $directw;

//////////////////////
// INTERNAL VARIABLES
//////////////////////
var $writingToC;    // mPDF 5.6.38
// mPDF 5.6.01
var $layers;
var $current_layer;
var $open_layer_pane;
var $decimal_offset;    // mPDF 5.6.13
var $inMeter;   // mPDF 5.5.09

var $CJKleading;
var $CJKfollowing;
var $CJKoverflow;

var $textshadow;

var $colsums;
var $spanborder;
var $spanborddet;

var $visibility;

var $useRC128encryption;
var $uniqid;

var $kerning;
var $fixedlSpacing;
var $minwSpacing;
var $lSpacingCSS;
var $wSpacingCSS;

var $listDir;
var $spotColorIDs;
var $SVGcolors;
var $spotColors;
var $defTextColor;
var $defDrawColor;
var $defFillColor;

var $tableBackgrounds;
var $inlineDisplayOff;
var $kt_y00;
var $kt_p00;
var $upperCase;
var $checkSIP;
var $checkSMP;
var $checkCJK;
var $tableCJK;

var $watermarkImgAlpha;
var $PDFAXwarnings;
var $MetadataRoot; 
var $OutputIntentRoot;
var $InfoRoot; 
var $current_filename;
var $parsers;
var $current_parser;
var $_obj_stack;
var $_don_obj_stack;
var $_current_obj_id;
var $tpls;
var $tpl;
var $tplprefix;
var $_res;

var $pdf_version;
var $noImageFile;
var $lastblockbottommargin;
var $baselineC;
var $subPos;
var $subArrMB;
var $ReqFontStyle;
var $tableClipPath ;
var $forceExactLineheight;
var $listOcc; 

var $fullImageHeight;
var $inFixedPosBlock;       // Internal flag for position:fixed block
var $fixedPosBlock;     // Buffer string for position:fixed block
var $fixedPosBlockDepth;
var $fixedPosBlockBBox;
var $fixedPosBlockSave;
var $maxPosL;
var $maxPosR;

var $loaded;

var $extraFontSubsets;
var $docTemplateStart;      // Internal flag for page (page no. -1) that docTemplate starts on
var $time0;

// Classes
var $indic;
var $barcode;

var $SHYpatterns;
var $loadedSHYpatterns;
var $loadedSHYdictionary;
var $SHYdictionary;
var $SHYdictionaryWords;

var $spanbgcolorarray;
var $default_font;
var $list_lineheight;
var $headerbuffer;
var $lastblocklevelchange;
var $nestedtablejustfinished;
var $linebreakjustfinished;
var $cell_border_dominance_L;
var $cell_border_dominance_R;
var $cell_border_dominance_T;
var $cell_border_dominance_B;
var $table_keep_together;
var $plainCell_properties;
var $inherit_lineheight;
var $listitemtype;
var $shrin_k1;
var $outerfilled;

var $blockContext;
var $floatDivs;


var $patterns;
var $pageBackgrounds;

var $bodyBackgroundGradient;
var $bodyBackgroundImage;
var $bodyBackgroundColor;

var $writingHTMLheader; // internal flag - used both for writing HTMLHeaders/Footers and FixedPos block
var $writingHTMLfooter;
var $autoFontGroups;
var $angle;

var $gradients;

var $kwt_Reference;
var $kwt_BMoutlines;
var $kwt_toc;

var $tbrot_Reference;
var $tbrot_BMoutlines;
var $tbrot_toc;

var $col_Reference;
var $col_BMoutlines;
var $col_toc;

var $currentGraphId;
var $graphs;

var $floatbuffer;
var $floatmargins;

var $bullet;
var $bulletarray;

var $rtlAsArabicFarsi;      // DEPRACATED

var $currentLang;
var $default_lang;
var $default_available_fonts;
var $pageTemplate;
var $docTemplate;
var $docTemplateContinue;

var $arabGlyphs;
var $arabHex;
var $persianGlyphs;
var $persianHex;
var $arabVowels;
var $arabPrevLink;
var $arabNextLink;


var $formobjects; // array of Form Objects for WMF
var $InlineProperties;
var $InlineAnnots;
var $ktAnnots;
var $tbrot_Annots;
var $kwt_Annots;
var $columnAnnots;
var $columnForms;

var $PageAnnots;

var $pageDim;   // Keep track of page wxh for orientation changes - set in _beginpage, used in _putannots

var $breakpoints;

var $tableLevel;
var $tbctr;
var $innermostTableLevel;
var $saveTableCounter;
var $cellBorderBuffer;

var $saveHTMLFooter_height;
var $saveHTMLFooterE_height;

var $firstPageBoxHeader;
var $firstPageBoxHeaderEven;
var $firstPageBoxFooter;
var $firstPageBoxFooterEven;

var $page_box;
var $show_marks;    // crop or cross marks

var $basepathIsLocal;

var $use_kwt;
var $kwt;
var $kwt_height;
var $kwt_y0;
var $kwt_x0;
var $kwt_buffer;
var $kwt_Links;
var $kwt_moved;
var $kwt_saved;

var $PageNumSubstitutions;

var $table_borders_separate;
var $base_table_properties;
var $borderstyles;

var $listjustfinished;
var $blockjustfinished;

var $orig_bMargin;
var $orig_tMargin;
var $orig_lMargin;
var $orig_rMargin;
var $orig_hMargin;
var $orig_fMargin;

var $pageheaders;
var $pagefooters;

var $pageHTMLheaders;
var $pageHTMLfooters;

var $saveHTMLHeader;
var $saveHTMLFooter;

var $HTMLheaderPageLinks;
var $HTMLheaderPageAnnots;
var $HTMLheaderPageForms;

// See config_fonts.php for these next 5 values
var $available_unifonts;
var $sans_fonts;
var $serif_fonts;
var $mono_fonts;
var $defaultSubsFont;

// List of ALL available CJK fonts (incl. styles) (Adobe add-ons)  hw removed
var $available_CJK_fonts;

var $HTMLHeader;
var $HTMLFooter;
var $HTMLHeaderE;
var $HTMLFooterE;
var $bufferoutput; 

var $showdefaultpagenos;    // DEPRACATED -left for backward compatability


// CJK fonts
var $Big5_widths;
var $GB_widths;
var $SJIS_widths;
var $UHC_widths;

// SetProtection
var $encrypted; //whether document is protected
var $Uvalue;    //U entry in pdf document
var $Ovalue;    //O entry in pdf document
var $Pvalue;    //P entry in pdf document
var $enc_obj_id;    //encryption object id
var $last_rc4_key;  //last RC4 key encrypted (cached for optimisation)
var $last_rc4_key_c;    //last RC4 computed key
var $encryption_key;
var $padding;   //used for encryption


// Bookmark
var $BMoutlines;
var $OutlineRoot;
// INDEX
var $ColActive;
var $Reference;
var $CurrCol;
var $NbCol;
var $y0;            //Top ordinate of columns
var $ColL;
var $ColWidth;
var $ColGap;
// COLUMNS 
var $ColR;
var $ChangeColumn;
var $columnbuffer;
var $ColDetails;
var $columnLinks;
var $colvAlign;
// Substitutions
var $substitute;        // Array of substitution strings e.g. <ttz>112</ttz>
var $entsearch;     // Array of HTML entities (>ASCII 127) to substitute
var $entsubstitute; // Array of substitution decimal unicode for the Hi entities


// Default values if no style sheet offered (cf. http://www.w3.org/TR/CSS21/sample.html)
var $defaultCSS;

var $linemaxfontsize;
var $lineheight_correction;
var $lastoptionaltag;   // Save current block item which HTML specifies optionsl endtag
var $pageoutput;
var $charset_in;
var $blk;
var $blklvl;
var $ColumnAdjust;
var $ws;    // Word spacing
var $HREF;
var $pgwidth;
var $fontlist; 
var $oldx;
var $oldy;
var $B;
var $U;      //underlining flag
var $S; // SmallCaps flag
var $I;

var $tdbegin;
var $table;
var $cell;
var $col;
var $row;

var $divbegin;
var $divalign;
var $divwidth;
var $divheight;
var $divrevert;
var $spanbgcolor;

var $spanlvl;
var $listlvl;
var $listnum;
var $listtype;
var $listoccur;
var $listlist;
var $listitem;

var $pjustfinished;
var $ignorefollowingspaces;
var $SUP;
var $SUB;
var $SMALL;
var $BIG;
var $toupper;
var $tolower;
var $capitalize;
var $dash_on;
var $dotted_on;
var $strike;

var $textbuffer;
var $currentfontstyle;
var $currentfontfamily;
var $currentfontsize;
var $colorarray;
var $bgcolorarray;
var $internallink;
var $enabledtags;

var $lineheight;
var $basepath;
var $textparam;

var $specialcontent;
var $selectoption;
var $objectbuffer;

// Table Rotation
var $table_rotate;
var $tbrot_maxw;
var $tbrot_maxh;
var $tablebuffer;
var $tbrot_align;
var $tbrot_Links;

var $divbuffer;     // Buffer used when keeping DIV on one page
var $keep_block_together;   // Keep a Block from page-break-inside: avoid
var $ktLinks;       // Keep-together Block links array
var $ktBlock;       // Keep-together Block array
var $ktForms;
var $ktReference;
var $ktBMoutlines;
var $_kttoc;

var $tbrot_y0;
var $tbrot_x0;
var $tbrot_w;
var $tbrot_h;

var $mb_enc;
var $directionality;

var $extgstates; // Used for alpha channel - Transparency (Watermark)
var $mgl;
var $mgt;
var $mgr;
var $mgb;

var $tts;
var $ttz;
var $tta;

var $headerDetails;
var $footerDetails;

// Best to alter the below variables using default stylesheet above
var $page_break_after_avoid;
var $margin_bottom_collapse;
var $list_indent;
var $list_align;
var $list_margin_bottom; 
var $default_font_size; // in pts
var $original_default_font_size;    // used to save default sizes when using table default
var $original_default_font;
var $watermark_font;
var $defaultAlign;

// TABLE
var $defaultTableAlign;
var $tablethead;
var $thead_font_weight;
var $thead_font_style;
var $thead_font_smCaps;
var $thead_valign_default;
var $thead_textalign_default;
var $tabletfoot;
var $tfoot_font_weight;
var $tfoot_font_style;
var $tfoot_font_smCaps;
var $tfoot_valign_default;
var $tfoot_textalign_default;

var $trow_text_rotate;

var $cellPaddingL;
var $cellPaddingR;
var $cellPaddingT;
var $cellPaddingB;
var $table_lineheight;
var $table_border_attr_set;
var $table_border_css_set;

var $shrin_k;           // factor with which to shrink tables - used internally - do not change
var $shrink_this_table_to_fit;  // 0 or false to disable; value (if set) gives maximum factor to reduce fontsize
var $MarginCorrection;  // corrects for OddEven Margins
var $margin_footer;
var $margin_header;

var $tabletheadjustfinished;
var $usingCoreFont;
var $charspacing;

//Private properties FROM FPDF
var $DisplayPreferences; 
var $flowingBlockAttr;
var $page;               //current page number
var $n;                  //current object number
var $offsets;            //array of object offsets
var $buffer;             //buffer holding in-memory PDF
var $pages;              //array containing pages
var $state;              //current document state
var $compress;           //compression flag
var $DefOrientation;     //default orientation
var $CurOrientation;     //current orientation
var $OrientationChanges; //array indicating orientation changes
var $k;                  //scale factor (number of points in user unit)
var $fwPt;
var $fhPt;         //dimensions of page format in points
var $fw;
var $fh;             //dimensions of page format in user unit
var $wPt;
var $hPt;           //current dimensions of page in points
var $w;
var $h;               //current dimensions of page in user unit
var $lMargin;            //left margin
var $tMargin;            //top margin
var $rMargin;            //right margin
var $bMargin;            //page break margin
var $cMarginL;            //cell margin Left
var $cMarginR;            //cell margin Right
var $cMarginT;            //cell margin Left
var $cMarginB;            //cell margin Right
var $DeflMargin;            //Default left margin
var $DefrMargin;            //Default right margin
var $x;
var $y;               //current position in user unit for cell positioning
var $lasth;              //height of last cell printed
var $LineWidth;          //line width in user unit
var $CoreFonts;          //array of standard font names
var $fonts;              //array of used fonts
var $FontFiles;          //array of font files
var $images;             //array of used images
var $PageLinks;          //array of links in pages
var $links;              //array of internal links
var $FontFamily;         //current font family
var $FontStyle;          //current font style
var $CurrentFont;        //current font info
var $FontSizePt;         //current font size in points
var $FontSize;           //current font size in user unit
var $DrawColor;          //commands for drawing color
var $FillColor;          //commands for filling color
var $TextColor;          //commands for text color
var $ColorFlag;          //indicates whether fill and text colors are different
var $autoPageBreak;      //automatic page breaking
var $PageBreakTrigger;   //threshold used to trigger page breaks
var $InFooter;           //flag set when processing footer
var $InHTMLFooter;

var $processingFooter;   //flag set when processing footer - added for columns
var $processingHeader;   //flag set when processing header - added for columns
var $ZoomMode;           //zoom display mode
var $LayoutMode;         //layout display mode
var $title;              //title
var $subject;            //subject
var $author;             //author
var $keywords;           //keywords
var $creator;            //creator

var $aliasNbPg;       //alias for total number of pages
var $aliasNbPgGp;       //alias for total number of pages in page group
var $aliasNbPgHex;
var $aliasNbPgGpHex;

var $ispre;

var $outerblocktags;
var $innerblocktags;


// **********************************
// **********************************
// **********************************
// **********************************
// **********************************
// **********************************
// **********************************
// **********************************
// **********************************

function mPDF($mode='',$format='A4',$default_font_size=0,$default_font='',$mgl=15,$mgr=15,$mgt=16,$mgb=16,$mgh=9,$mgf=9, $orientation='P') {

/*-- BACKGROUNDS --*/
        if (!class_exists('grad', false)) { include(_MPDF_PATH.'classes/grad.php'); }
        if (empty($this->grad)) { $this->grad = new grad($this); }
/*-- END BACKGROUNDS --*/
/*-- FORMS --*/
        if (!class_exists('form', false)) { include(_MPDF_PATH.'classes/form.php'); }
        if (empty($this->form)) { $this->form = new form($this); }
/*-- END FORMS --*/

    $this->time0 = microtime(true);
    //Some checks
    $this->_dochecks();

    // Set up Aliases for backwards compatability
    $this->UnvalidatedText =& $this->watermarkText;
    $this->TopicIsUnvalidated =& $this->showWatermarkText;
    $this->AliasNbPg =& $this->aliasNbPg;
    $this->AliasNbPgGp =& $this->aliasNbPgGp;
    $this->BiDirectional =& $this->biDirectional;
    $this->Anchor2Bookmark =& $this->anchor2Bookmark;
    $this->KeepColumns =& $this->keepColumns;
    $this->useOddEven =& $this->mirrorMargins;
    $this->useSubstitutionsMB =& $this->useSubstitutions;

    $this->writingToC = false;  // mPDF 5.6.38
    // mPDF 5.6.01
    $this->layers = array();
    $this->current_layer = 0;
    $this->open_layer_pane = false;

    $this->visibility='visible';

    //Initialization of properties
    $this->spotColors=array();
    $this->spotColorIDs = array();
    $this->tableBackgrounds = array();

    $this->kt_y00 = '';
    $this->kt_p00 = '';
    $this->iterationCounter = false;
    $this->BMPonly = array();
    $this->page=0;
    $this->n=2;
    $this->buffer='';
    $this->objectbuffer = array();
    $this->pages=array();
    $this->OrientationChanges=array();
    $this->state=0;
    $this->fonts=array();
    $this->FontFiles=array();
    $this->images=array();
    $this->links=array();
    $this->InFooter=false;
    $this->processingFooter=false;
    $this->processingHeader=false;
    $this->lasth=0;
    $this->FontFamily='';
    $this->FontStyle='';
    $this->FontSizePt=9;
    $this->U=false;
    // Small Caps
    $this->upperCase = array();
    $this->S = false;
    $this->smCapsScale = 1;
    $this->smCapsStretch = 100;
    $this->margBuffer = 0;  // mPDF 5.4.04
    $this->inMeter = false; // mPDF 5.5.09
    $this->decimal_offset = 0;

    $this->defTextColor = $this->TextColor = $this->SetTColor($this->ConvertColor(0),true);
    $this->defDrawColor = $this->DrawColor = $this->SetDColor($this->ConvertColor(0),true);
    $this->defFillColor = $this->FillColor = $this->SetFColor($this->ConvertColor(255),true);

    //SVG color names array
    //http://www.w3schools.com/css/css_colornames.asp
    $this->SVGcolors = array('antiquewhite'=>'#FAEBD7','aqua'=>'#00FFFF','aquamarine'=>'#7FFFD4','beige'=>'#F5F5DC','black'=>'#000000',
'blue'=>'#0000FF','brown'=>'#A52A2A','cadetblue'=>'#5F9EA0','chocolate'=>'#D2691E','cornflowerblue'=>'#6495ED','crimson'=>'#DC143C',
'darkblue'=>'#00008B','darkgoldenrod'=>'#B8860B','darkgreen'=>'#006400','darkmagenta'=>'#8B008B','darkorange'=>'#FF8C00',
'darkred'=>'#8B0000','darkseagreen'=>'#8FBC8F','darkslategray'=>'#2F4F4F','darkviolet'=>'#9400D3','deepskyblue'=>'#00BFFF',
'dodgerblue'=>'#1E90FF','firebrick'=>'#B22222','forestgreen'=>'#228B22','fuchsia'=>'#FF00FF','gainsboro'=>'#DCDCDC','gold'=>'#FFD700',
'gray'=>'#808080','green'=>'#008000','greenyellow'=>'#ADFF2F','hotpink'=>'#FF69B4','indigo'=>'#4B0082','khaki'=>'#F0E68C',
'lavenderblush'=>'#FFF0F5','lemonchiffon'=>'#FFFACD','lightcoral'=>'#F08080','lightgoldenrodyellow'=>'#FAFAD2','lightgreen'=>'#90EE90',
'lightsalmon'=>'#FFA07A','lightskyblue'=>'#87CEFA','lightslategray'=>'#778899','lightyellow'=>'#FFFFE0','lime'=>'#00FF00','limegreen'=>'#32CD32',
'magenta'=>'#FF00FF','maroon'=>'#800000','mediumaquamarine'=>'#66CDAA','mediumorchid'=>'#BA55D3','mediumseagreen'=>'#3CB371',
'mediumspringgreen'=>'#00FA9A','mediumvioletred'=>'#C71585','midnightblue'=>'#191970','mintcream'=>'#F5FFFA','moccasin'=>'#FFE4B5','navy'=>'#000080',
'olive'=>'#808000','orange'=>'#FFA500','orchid'=>'#DA70D6','palegreen'=>'#98FB98',
'palevioletred'=>'#D87093','peachpuff'=>'#FFDAB9','pink'=>'#FFC0CB','powderblue'=>'#B0E0E6','purple'=>'#800080',
'red'=>'#FF0000','royalblue'=>'#4169E1','salmon'=>'#FA8072','seagreen'=>'#2E8B57','sienna'=>'#A0522D','silver'=>'#C0C0C0','skyblue'=>'#87CEEB',
'slategray'=>'#708090','springgreen'=>'#00FF7F','steelblue'=>'#4682B4','tan'=>'#D2B48C','teal'=>'#008080','thistle'=>'#D8BFD8','turquoise'=>'#40E0D0',
'violetred'=>'#D02090','white'=>'#FFFFFF','yellow'=>'#FFFF00', 
'aliceblue'=>'#f0f8ff', 'azure'=>'#f0ffff', 'bisque'=>'#ffe4c4', 'blanchedalmond'=>'#ffebcd', 'blueviolet'=>'#8a2be2', 'burlywood'=>'#deb887', 
'chartreuse'=>'#7fff00', 'coral'=>'#ff7f50', 'cornsilk'=>'#fff8dc', 'cyan'=>'#00ffff', 'darkcyan'=>'#008b8b', 'darkgray'=>'#a9a9a9', 
'darkgrey'=>'#a9a9a9', 'darkkhaki'=>'#bdb76b', 'darkolivegreen'=>'#556b2f', 'darkorchid'=>'#9932cc', 'darksalmon'=>'#e9967a', 
'darkslateblue'=>'#483d8b', 'darkslategrey'=>'#2f4f4f', 'darkturquoise'=>'#00ced1', 'deeppink'=>'#ff1493', 'dimgray'=>'#696969', 
'dimgrey'=>'#696969', 'floralwhite'=>'#fffaf0', 'ghostwhite'=>'#f8f8ff', 'goldenrod'=>'#daa520', 'grey'=>'#808080', 'honeydew'=>'#f0fff0', 
'indianred'=>'#cd5c5c', 'ivory'=>'#fffff0', 'lavender'=>'#e6e6fa', 'lawngreen'=>'#7cfc00', 'lightblue'=>'#add8e6', 'lightcyan'=>'#e0ffff', 
'lightgray'=>'#d3d3d3', 'lightgrey'=>'#d3d3d3', 'lightpink'=>'#ffb6c1', 'lightseagreen'=>'#20b2aa', 'lightslategrey'=>'#778899', 
'lightsteelblue'=>'#b0c4de', 'linen'=>'#faf0e6', 'mediumblue'=>'#0000cd', 'mediumpurple'=>'#9370db', 'mediumslateblue'=>'#7b68ee', 
'mediumturquoise'=>'#48d1cc', 'mistyrose'=>'#ffe4e1', 'navajowhite'=>'#ffdead', 'oldlace'=>'#fdf5e6', 'olivedrab'=>'#6b8e23', 'orangered'=>'#ff4500', 
'palegoldenrod'=>'#eee8aa', 'paleturquoise'=>'#afeeee', 'papayawhip'=>'#ffefd5', 'peru'=>'#cd853f', 'plum'=>'#dda0dd', 'rosybrown'=>'#bc8f8f', 
'saddlebrown'=>'#8b4513', 'sandybrown'=>'#f4a460', 'seashell'=>'#fff5ee', 'slateblue'=>'#6a5acd', 'slategrey'=>'#708090', 'snow'=>'#fffafa', 
'tomato'=>'#ff6347', 'violet'=>'#ee82ee', 'wheat'=>'#f5deb3', 'whitesmoke'=>'#f5f5f5', 'yellowgreen'=>'#9acd32');

    $this->ColorFlag=false;
    $this->extgstates = array();

    $this->mb_enc='windows-1252';
    $this->directionality='ltr';
    $this->defaultAlign = 'L';
    $this->defaultTableAlign = 'L';

    $this->fixedPosBlockSave = array();
    $this->extraFontSubsets = 0;

    $this->SHYpatterns = array();
    $this->loadedSHYdictionary = false;
    $this->SHYdictionary = array();
    $this->SHYdictionaryWords = array();
    $this->blockContext = 1;
    $this->floatDivs = array();
    $this->DisplayPreferences=''; 

    $this->patterns = array();      // Tiling patterns used for backgrounds
    $this->pageBackgrounds = array();
    $this->writingHTMLheader = false;   // internal flag - used both for writing HTMLHeaders/Footers and FixedPos block
    $this->writingHTMLfooter = false;   // internal flag - used both for writing HTMLHeaders/Footers and FixedPos block
    $this->gradients = array();

    $this->kwt_Reference = array();
    $this->kwt_BMoutlines = array();
    $this->kwt_toc = array();

    $this->tbrot_Reference = array();
    $this->tbrot_BMoutlines = array();
    $this->tbrot_toc = array();

    $this->col_Reference = array();
    $this->col_BMoutlines = array();
    $this->col_toc = array();
    $this->graphs = array();

    $this->pgsIns = array();
    $this->PDFAXwarnings = array();
    $this->inlineDisplayOff = false;
    $this->kerning = false;
    $this->lSpacingCSS = '';
    $this->wSpacingCSS = '';
    $this->fixedlSpacing = false;
    $this->minwSpacing = 0;


    $this->baselineC = 0.35;    // Baseline for text
    $this->noImageFile = str_replace("\\","/",dirname(__FILE__)) . '/includes/no_image.jpg';
    $this->subPos = 0;
    $this->forceExactLineheight = false;
    $this->listOcc = 0;
    $this->normalLineheight = 1.3;
    // These are intended as configuration variables, and should be set in config.php - which will override these values; 
    // set here as failsafe as will cause an error if not defined
    $this->incrementFPR1 = 10;
    $this->incrementFPR2 = 10;
    $this->incrementFPR3 = 10;
    $this->incrementFPR4 = 10;

    $this->fullImageHeight = false;
    $this->floatbuffer = array();
    $this->floatmargins = array();
    $this->autoFontGroups = 0;
    $this->formobjects=array(); // array of Form Objects for WMF
    $this->InlineProperties=array();
    $this->InlineAnnots=array();
    $this->ktAnnots=array();
    $this->tbrot_Annots=array();
    $this->kwt_Annots=array();
    $this->columnAnnots=array();
    $this->pageDim=array();
    $this->breakpoints = array();   // used in columnbuffer
    $this->tableLevel=0;
    $this->tbctr=array();   // counter for nested tables at each level
    $this->page_box = array();
    $this->show_marks = ''; // crop or cross marks
    $this->kwt = false;
    $this->kwt_height = 0;
    $this->kwt_y0 = 0;
    $this->kwt_x0 = 0;
    $this->kwt_buffer = array();
    $this->kwt_Links = array();
    $this->kwt_moved = false;
    $this->kwt_saved = false;
    $this->PageNumSubstitutions = array();
    $this->base_table_properties=array();
    $this->borderstyles = array('inset','groove','outset','ridge','dotted','dashed','solid','double');
    $this->tbrot_align = 'C';
    $this->pageheaders=array();
    $this->pagefooters=array();

    $this->pageHTMLheaders=array();
    $this->pageHTMLfooters=array();
    $this->HTMLheaderPageLinks = array();
    $this->HTMLheaderPageAnnots = array();

    $this->ktForms = array();
    $this->HTMLheaderPageForms = array();
    $this->columnForms = array();
    $this->tbrotForms = array();
    $this->useRC128encryption = false;
    $this->uniqid = '';

    $this->bufferoutput = false; 
    $this->encrypted=false;         //whether document is protected
    $this->BMoutlines=array();
    $this->ColActive=0;             //Flag indicating that columns are on (the index is being processed)
    $this->Reference=array();       //Array containing the references
    $this->CurrCol=0;               //Current column number
    $this->ColL = array(0);         // Array of Left pos of columns - absolute - needs Margin correction for Odd-Even
    $this->ColR = array(0);         // Array of Right pos of columns - absolute pos - needs Margin correction for Odd-Even
    $this->ChangeColumn = 0;
    $this->columnbuffer = array();
    $this->ColDetails = array();        // Keeps track of some column details
    $this->columnLinks = array();       // Cross references PageLinks
    $this->substitute = array();        // Array of substitution strings e.g. <ttz>112</ttz>
    $this->entsearch = array();     // Array of HTML entities (>ASCII 127) to substitute
    $this->entsubstitute = array(); // Array of substitution decimal unicode for the Hi entities
    $this->lastoptionaltag = '';
    $this->charset_in = '';
    $this->blk = array();
    $this->blklvl = 0;
    $this->tts = false;
    $this->ttz = false;
    $this->tta = false;
    $this->ispre=false;

    $this->checkSIP = false;
    $this->checkSMP = false;
    $this->checkCJK = false;
    $this->tableCJK = false;

    $this->headerDetails=array();
    $this->footerDetails=array();
    $this->page_break_after_avoid = false;
    $this->margin_bottom_collapse = false;
    $this->tablethead = 0;
    $this->tabletfoot = 0;
    $this->table_border_attr_set = 0;
    $this->table_border_css_set = 0;
    $this->shrin_k = 1.0;
    $this->shrink_this_table_to_fit = 0;
    $this->MarginCorrection = 0;

    $this->tabletheadjustfinished = false;
    $this->usingCoreFont = false;
    $this->charspacing=0;

    $this->autoPageBreak = true;

    require(_MPDF_PATH.'config.php');   // config data

    $this->_setPageSize($format, $orientation);
    $this->DefOrientation=$orientation;

    $this->margin_header=$mgh;
    $this->margin_footer=$mgf;

    $bmargin=$mgb;

    $this->DeflMargin = $mgl;
    $this->DefrMargin = $mgr;

    $this->orig_tMargin = $mgt;
    $this->orig_bMargin = $bmargin;
    $this->orig_lMargin = $this->DeflMargin;
    $this->orig_rMargin = $this->DefrMargin;
    $this->orig_hMargin = $this->margin_header;
    $this->orig_fMargin = $this->margin_footer;

    if ($this->setAutoTopMargin=='pad') { $mgt += $this->margin_header; }
    if ($this->setAutoBottomMargin=='pad') { $mgb += $this->margin_footer; }
    $this->SetMargins($this->DeflMargin,$this->DefrMargin,$mgt);    // sets l r t margin
    //Automatic page break
    $this->SetAutoPageBreak($this->autoPageBreak,$bmargin); // sets $this->bMargin & PageBreakTrigger

    $this->pgwidth = $this->w - $this->lMargin - $this->rMargin;

    //Interior cell margin (1 mm) ? not used
    $this->cMarginL = 1;
    $this->cMarginR = 1;
    //Line width (0.2 mm)
    $this->LineWidth=.567/_MPDFK;

    //To make the function Footer() work - replaces {nb} with page number
    $this->AliasNbPages();
    $this->AliasNbPageGroups();

    $this->aliasNbPgHex = '{nbHEXmarker}';
    $this->aliasNbPgGpHex = '{nbpgHEXmarker}';

    //Enable all tags as default
    $this->DisableTags();
    //Full width display mode
    $this->SetDisplayMode(100); // fullwidth?       'fullpage'
    //Compression
    $this->SetCompression(true);
    //Set default display preferences
    $this->SetDisplayPreferences(''); 

    // Font data
    require(_MPDF_PATH.'config_fonts.php');
    // Available fonts
    $this->available_unifonts = array();
    foreach ($this->fontdata AS $f => $fs) {
        if (isset($fs['R']) && $fs['R']) { $this->available_unifonts[] = $f; }
        if (isset($fs['B']) && $fs['B']) { $this->available_unifonts[] = $f.'B'; }
        if (isset($fs['I']) && $fs['I']) { $this->available_unifonts[] = $f.'I'; }
        if (isset($fs['BI']) && $fs['BI']) { $this->available_unifonts[] = $f.'BI'; }
    }

    $this->default_available_fonts = $this->available_unifonts;

    $optcore = false;
    $onlyCoreFonts = false;
    if (preg_match('/([\-+])aCJK/i',$mode, $m)) {
        preg_replace('/([\-+])aCJK/i','',$mode);
        if ($m[1]=='+') { $this->useAdobeCJK = true; }
        else { $this->useAdobeCJK = false; }
    }

    if (strlen($mode)==1) {
        if ($mode=='s') { $this->percentSubset = 100; $mode = ''; }
        else if ($mode=='c') { $onlyCoreFonts = true; $mode = ''; }
    }
    else if (substr($mode,-2)=='-s') {
        $this->percentSubset = 100; 
        $mode = substr($mode,0,strlen($mode)-2);
    }
    else if (substr($mode,-2)=='-c') {
        $onlyCoreFonts = true;
        $mode = substr($mode,0,strlen($mode)-2);
    }
    else if (substr($mode,-2)=='-x') {
        $optcore = true;
        $mode = substr($mode,0,strlen($mode)-2);
    }

    // Autodetect if mode is a language_country string (en-GB or en_GB or en)
    if ((strlen($mode) == 5 && $mode != 'UTF-8') || strlen($mode) == 2) {
        list ($coreSuitable,$mpdf_pdf_unifonts) = GetLangOpts($mode, $this->useAdobeCJK);
        if ($coreSuitable && $optcore) { $onlyCoreFonts = true; }
        if ($mpdf_pdf_unifonts) { 
            $this->RestrictUnicodeFonts($mpdf_pdf_unifonts); 
            $this->default_available_fonts = $mpdf_pdf_unifonts;
        }
        $this->currentLang = $mode;
        $this->default_lang = $mode;
    }

    $this->onlyCoreFonts =  $onlyCoreFonts;

    if ($this->onlyCoreFonts) {
        $this->setMBencoding('windows-1252');   // sets $this->mb_enc
    }
    else {
        $this->setMBencoding('UTF-8');  // sets $this->mb_enc
    }
    @mb_regex_encoding('UTF-8');    // required only for mb_ereg... and mb_split functions


    // Adobe CJK fonts
    $this->available_CJK_fonts = array('gb','big5','sjis','uhc','gbB','big5B','sjisB','uhcB','gbI','big5I','sjisI','uhcI',
        'gbBI','big5BI','sjisBI','uhcBI');


    //Standard fonts
    $this->CoreFonts=array('ccourier'=>'Courier','ccourierB'=>'Courier-Bold','ccourierI'=>'Courier-Oblique','ccourierBI'=>'Courier-BoldOblique',
        'chelvetica'=>'Helvetica','chelveticaB'=>'Helvetica-Bold','chelveticaI'=>'Helvetica-Oblique','chelveticaBI'=>'Helvetica-BoldOblique',
        'ctimes'=>'Times-Roman','ctimesB'=>'Times-Bold','ctimesI'=>'Times-Italic','ctimesBI'=>'Times-BoldItalic',
        'csymbol'=>'Symbol','czapfdingbats'=>'ZapfDingbats');
    $this->fontlist=array("ctimes","ccourier","chelvetica","csymbol","czapfdingbats");

    // Substitutions
    $this->setHiEntitySubstitutions();

    if ($this->onlyCoreFonts) {
        $this->useSubstitutions = true;
        $this->SetSubstitutions();
    }
    else { $this->useSubstitutions = false; }

/*-- HTML-CSS --*/

    if (!class_exists('cssmgr', false)) { include(_MPDF_PATH .'classes/cssmgr.php'); }
    $this->cssmgr = new cssmgr($this);
    if (file_exists(_MPDF_PATH.'mpdf.css')) {
        $css = file_get_contents(_MPDF_PATH.'mpdf.css');
        $css2 = $this->cssmgr->ReadDefaultCSS($css);
        $this->defaultCSS = $this->cssmgr->array_merge_recursive_unique($this->defaultCSS,$css2); 
    }
/*-- END HTML-CSS --*/

    if ($default_font=='') { 
      if ($this->onlyCoreFonts) { 
        if (in_array(strtolower($this->defaultCSS['BODY']['FONT-FAMILY']),$this->mono_fonts)) { $default_font = 'ccourier'; }
        else if (in_array(strtolower($this->defaultCSS['BODY']['FONT-FAMILY']),$this->sans_fonts)) { $default_font = 'chelvetica'; }
        else { $default_font = 'ctimes'; }
      }
      else { $default_font = $this->defaultCSS['BODY']['FONT-FAMILY']; }
    }
    if (!$default_font_size) { 
        $mmsize = $this->ConvertSize($this->defaultCSS['BODY']['FONT-SIZE']);
        $default_font_size = $mmsize*(_MPDFK);
    }

    if ($default_font) { $this->SetDefaultFont($default_font); }
    if ($default_font_size) { $this->SetDefaultFontSize($default_font_size); }

    $this->SetLineHeight(); // lineheight is in mm

    $this->SetFColor($this->ConvertColor(255));
    $this->HREF='';
    $this->oldy=-1;
    $this->B=0;
    $this->U=false;
    $this->S=false;
    $this->I=0;

    $this->listlvl=0;
    $this->listnum=0; 
    $this->listtype='';
    $this->listoccur=array();
    $this->listlist=array();
    $this->listitem=array();

    $this->tdbegin=false; 
    $this->table=array(); 
    $this->cell=array();  
    $this->col=-1; 
    $this->row=-1; 
    $this->cellBorderBuffer = array();

    $this->divbegin=false;
    $this->divalign='';
    $this->divwidth=0; 
    $this->divheight=0; 
    $this->spanbgcolor=false;
    $this->divrevert=false;
    $this->spanborder=false;
    $this->spanborddet=array();

    $this->blockjustfinished=false;
    $this->listjustfinished=false;
    $this->ignorefollowingspaces = true; //in order to eliminate exceeding left-side spaces
    $this->toupper=false;
    $this->tolower=false;
    $this->capitalize=false;
    $this->dash_on=false;
    $this->dotted_on=false;
    $this->SUP=false;
    $this->SUB=false;
    $this->strike=false;
    $this->textshadow='';

    $this->currentfontfamily='';
    $this->currentfontsize='';
    $this->currentfontstyle='';
    $this->colorarray=array();
    $this->spanbgcolorarray=array();
    $this->textbuffer=array();
    $this->internallink=array();
    $this->basepath = "";

    $this->SetBasePath('');

    $this->textparam = array();

    $this->specialcontent = '';
    $this->selectoption = array();

/*-- IMPORTS --*/

    $this->tpls = array();
    $this->tpl = 0;
    $this->tplprefix = "/TPL";
    $this->res = array();
    if ($this->enableImports) {
        $this->SetImportUse();
    }
/*-- END IMPORTS --*/

    if ($this->progressBar) { $this->StartProgressBarOutput($this->progressBar) ;   }   // *PROGRESS-BAR*
}


function _setPageSize($format, &$orientation) {
    //Page format
    if(is_string($format))
    {
        if ($format=='') { $format = 'A4'; }
        $pfo = 'P';
        if(preg_match('/([0-9a-zA-Z]*)-L/i',$format,$m)) {  // e.g. A4-L = A4 landscape
            $format=$m[1]; 
            $pfo='L'; 
        }
        $format = $this->_getPageFormat($format);
        if (!$format) { $this->Error('Unknown page format: '.$format); }
        else { $orientation = $pfo; }

        $this->fwPt=$format[0];
        $this->fhPt=$format[1];
    }
    else
    {
        if (!$format[0] || !$format[1]) { $this->Error('Invalid page format: '.$format[0].' '.$format[1]); }
        $this->fwPt=$format[0]*_MPDFK;
        $this->fhPt=$format[1]*_MPDFK;
    }
    $this->fw=$this->fwPt/_MPDFK;
    $this->fh=$this->fhPt/_MPDFK;
    //Page orientation
    $orientation=strtolower($orientation);
    if($orientation=='p' or $orientation=='portrait')
    {
        $orientation='P';
        $this->wPt=$this->fwPt;
        $this->hPt=$this->fhPt;
    }
    elseif($orientation=='l' or $orientation=='landscape')
    {
        $orientation='L';
        $this->wPt=$this->fhPt;
        $this->hPt=$this->fwPt;
    }
    else $this->Error('Incorrect orientation: '.$orientation);
    $this->CurOrientation=$orientation;

    $this->w=$this->wPt/_MPDFK;
    $this->h=$this->hPt/_MPDFK;
}

function _getPageFormat($format) {
        switch (strtoupper($format)) {
            case '4A0': {$format = array(4767.87,6740.79); break;}
            case '2A0': {$format = array(3370.39,4767.87); break;}
            case 'A0': {$format = array(2383.94,3370.39); break;}
            case 'A1': {$format = array(1683.78,2383.94); break;}
            case 'A2': {$format = array(1190.55,1683.78); break;}
            case 'A3': {$format = array(841.89,1190.55); break;}
            case 'A4': default: {$format = array(595.28,841.89); break;}
            case 'A5': {$format = array(419.53,595.28); break;}
            case 'A6': {$format = array(297.64,419.53); break;}
            case 'A7': {$format = array(209.76,297.64); break;}
            case 'A8': {$format = array(147.40,209.76); break;}
            case 'A9': {$format = array(104.88,147.40); break;}
            case 'A10': {$format = array(73.70,104.88); break;}
            case 'B0': {$format = array(2834.65,4008.19); break;}
            case 'B1': {$format = array(2004.09,2834.65); break;}
            case 'B2': {$format = array(1417.32,2004.09); break;}
            case 'B3': {$format = array(1000.63,1417.32); break;}
            case 'B4': {$format = array(708.66,1000.63); break;}
            case 'B5': {$format = array(498.90,708.66); break;}
            case 'B6': {$format = array(354.33,498.90); break;}
            case 'B7': {$format = array(249.45,354.33); break;}
            case 'B8': {$format = array(175.75,249.45); break;}
            case 'B9': {$format = array(124.72,175.75); break;}
            case 'B10': {$format = array(87.87,124.72); break;}
            case 'C0': {$format = array(2599.37,3676.54); break;}
            case 'C1': {$format = array(1836.85,2599.37); break;}
            case 'C2': {$format = array(1298.27,1836.85); break;}
            case 'C3': {$format = array(918.43,1298.27); break;}
            case 'C4': {$format = array(649.13,918.43); break;}
            case 'C5': {$format = array(459.21,649.13); break;}
            case 'C6': {$format = array(323.15,459.21); break;}
            case 'C7': {$format = array(229.61,323.15); break;}
            case 'C8': {$format = array(161.57,229.61); break;}
            case 'C9': {$format = array(113.39,161.57); break;}
            case 'C10': {$format = array(79.37,113.39); break;}
            case 'RA0': {$format = array(2437.80,3458.27); break;}
            case 'RA1': {$format = array(1729.13,2437.80); break;}
            case 'RA2': {$format = array(1218.90,1729.13); break;}
            case 'RA3': {$format = array(864.57,1218.90); break;}
            case 'RA4': {$format = array(609.45,864.57); break;}
            case 'SRA0': {$format = array(2551.18,3628.35); break;}
            case 'SRA1': {$format = array(1814.17,2551.18); break;}
            case 'SRA2': {$format = array(1275.59,1814.17); break;}
            case 'SRA3': {$format = array(907.09,1275.59); break;}
            case 'SRA4': {$format = array(637.80,907.09); break;}
            case 'LETTER': {$format = array(612.00,792.00); break;}
            case 'LEGAL': {$format = array(612.00,1008.00); break;}
            case 'LEDGER': {$format = array(279.00,432.00); break;}
            case 'TABLOID': {$format = array(279.00,432.00); break;}
            case 'EXECUTIVE': {$format = array(521.86,756.00); break;}
            case 'FOLIO': {$format = array(612.00,936.00); break;}
            case 'B': {$format=array(362.83,561.26 );    break;}        //  'B' format paperback size 128x198mm
            case 'A': {$format=array(314.65,504.57 );    break;}        //  'A' format paperback size 111x178mm
            case 'DEMY': {$format=array(382.68,612.28 );  break;}       //  'Demy' format paperback size 135x216mm
            case 'ROYAL': {$format=array(433.70,663.30 );  break;}  //  'Royal' format paperback size 153x234mm
            default: $format = false;
        }
    return $format;
}


/*-- PROGRESS-BAR --*/
function StartProgressBarOutput($mode=1) {
    // must be relative path, or URI (not a file system path)
    if (!defined('_MPDF_URI')) { 
        $this->progressBar = false;
        if ($this->debug) { $this->Error("You need to define _MPDF_URI to use the progress bar!"); }
        else return false; 
    }
    $this->progressBar = $mode;
    if ($this->progbar_altHTML) {
        echo $this->progbar_altHTML;
    }
    else {
       echo '<html>
    <head>
    <title>mPDF File Progress</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="'._MPDF_URI.'progbar.css" />
        </head>
    <body>
    <div class="main">
        <div class="heading">'.$this->progbar_heading.'</div>
        <div class="demo">
       ';
       if ($this->progressBar==2) { echo '      <table width="100%"><tr><td style="width: 50%;"> 
            <span class="barheading">Writing HTML code</span> <br/>

            <div class="progressBar">
            <div id="element1"  class="innerBar">&nbsp;</div>
            </div>
            <span class="code" id="box1"></span>
            </td><td style="width: 50%;">
            <span class="barheading">Autosizing elements</span> <br/>
            <div class="progressBar">
            <div id="element4"  class="innerBar">&nbsp;</div>
            </div>
            <span class="code" id="box4"></span>
            <br/><br/>
            <span class="barheading">Writing Tables</span> <br/>
            <div class="progressBar">
            <div id="element7"  class="innerBar">&nbsp;</div>
            </div>
            <span class="code" id="box7"></span>
            </td></tr>
            <tr><td><br /><br /></td><td></td></tr>
            <tr><td style="width: 50%;"> 
    '; }
    echo '          <span class="barheading">Writing PDF file</span> <br/>
            <div class="progressBar">
            <div id="element2"  class="innerBar">&nbsp;</div>
            </div>
            <span class="code" id="box2"></span>
       ';
       if ($this->progressBar==2) { echo '
            </td><td style="width: 50%;">
            <span class="barheading">Memory usage</span> <br/>
            <div class="progressBar">
            <div id="element5"  class="innerBar">&nbsp;</div>
            </div>
            <span id="box5">0</span> '.ini_get("memory_limit").'<br />
            <br/><br/>
            <span class="barheading">Memory usage (peak)</span> <br/>
            <div class="progressBar">
            <div id="element6"  class="innerBar">&nbsp;</div>
            </div>
            <span id="box6">0</span> '.ini_get("memory_limit").'<br />
            </td></tr>
            </table>
       '; }
       echo '           <br/><br/>
        <span id="box3"></span>

        </div>
       ';
    }
    ob_flush();
      flush();
}

function UpdateProgressBar($el,$val,$txt='') {
    // $val should be a string - 5 = actual value, +15 = increment

    if ($this->progressBar<2) {
        if ($el>3) { return; }
        else if ($el ==1) { $el = 2; }
    }
    echo '<script type="text/javascript">';
    if ($val) { echo ' document.getElementById(\'element'.$el.'\').style.width=\''.$val.'%\'; '; }
    if ($txt) { echo ' document.getElementById(\'box'.$el.'\').innerHTML=\''.$txt.'\'; '; }
    if ($this->progressBar==2) { 
        $m = round(memory_get_usage(true)/1048576);
        $m2 = round(memory_get_peak_usage(true)/1048576);
        $mem = $m * 100 / (ini_get("memory_limit")+0);
        $mem2 = $m2 * 100 / (ini_get("memory_limit")+0);
        echo ' document.getElementById(\'element5\').style.width=\''.$mem.'%\'; '; 
        echo ' document.getElementById(\'element6\').style.width=\''.$mem2.'%\'; '; 
        echo ' document.getElementById(\'box5\').innerHTML=\''.$m.'MB / \'; '; 
        echo ' document.getElementById(\'box6\').innerHTML=\''.$m2.'MB / \'; '; 
    }
    echo '</script>'."\n";
    ob_flush();
    flush();
}
/*-- END PROGRESS-BAR --*/



function RestrictUnicodeFonts($res) {
    // $res = array of (Unicode) fonts to restrict to: e.g. norasi|norasiB - language specific
    if (count($res)) {  // Leave full list of available fonts if passed blank array
        $this->available_unifonts = $res;
    }
    else { $this->available_unifonts = $this->default_available_fonts; }
    if (count($this->available_unifonts) == 0) { $this->available_unifonts[] = $this->default_available_fonts[0]; }
    $this->available_unifonts = array_values($this->available_unifonts);
}


function setMBencoding($enc) {
    if ($this->mb_enc != $enc) { 
        $this->mb_enc = $enc; 
        mb_internal_encoding($this->mb_enc); 
    }
}


function SetMargins($left,$right,$top) {
    //Set left, top and right margins
    $this->lMargin=$left;
    $this->rMargin=$right;
    $this->tMargin=$top;
}

function ResetMargins() {
    //ReSet left, top margins
    if (($this->forcePortraitHeaders || $this->forcePortraitMargins) && $this->DefOrientation=='P' && $this->CurOrientation=='L') {
        if (($this->mirrorMargins) && (($this->page)%2==0)) {   // EVEN
        $this->tMargin=$this->orig_rMargin;
        $this->bMargin=$this->orig_lMargin;
        }
        else {  // ODD  // OR NOT MIRRORING MARGINS/FOOTERS
        $this->tMargin=$this->orig_lMargin;
        $this->bMargin=$this->orig_rMargin;
        }
       $this->lMargin=$this->DeflMargin;
       $this->rMargin=$this->DefrMargin;
       $this->MarginCorrection = 0;
       $this->PageBreakTrigger=$this->h-$this->bMargin;
    }
    else  if (($this->mirrorMargins) && (($this->page)%2==0)) { // EVEN
        $this->lMargin=$this->DefrMargin;
        $this->rMargin=$this->DeflMargin;
        $this->MarginCorrection = $this->DefrMargin-$this->DeflMargin;

    }
    else {  // ODD  // OR NOT MIRRORING MARGINS/FOOTERS
        $this->lMargin=$this->DeflMargin;
        $this->rMargin=$this->DefrMargin;
        if ($this->mirrorMargins) { $this->MarginCorrection = $this->DeflMargin-$this->DefrMargin; }
    }
    $this->x=$this->lMargin;

}

function SetLeftMargin($margin) {
    //Set left margin
    $this->lMargin=$margin;
    if($this->page>0 and $this->x<$margin) $this->x=$margin;
}

function SetTopMargin($margin) {
    //Set top margin
    $this->tMargin=$margin;
}

function SetRightMargin($margin) {
    //Set right margin
    $this->rMargin=$margin;
}

function SetAutoPageBreak($auto,$margin=0) {
    //Set auto page break mode and triggering margin
    $this->autoPageBreak=$auto;
    $this->bMargin=$margin;
    $this->PageBreakTrigger=$this->h-$margin;
}

function SetDisplayMode($zoom,$layout='continuous') {
    //Set display mode in viewer
    if($zoom=='fullpage' or $zoom=='fullwidth' or $zoom=='real' or $zoom=='default' or !is_string($zoom))
        $this->ZoomMode=$zoom;
    else
        $this->Error('Incorrect zoom display mode: '.$zoom);
    if($layout=='single' or $layout=='continuous' or $layout=='two' or $layout=='twoleft' or $layout=='tworight' or $layout=='default')
        $this->LayoutMode=$layout;
    else
        $this->Error('Incorrect layout display mode: '.$layout);
}

function SetCompression($compress) {
    //Set page compression
    if(function_exists('gzcompress'))   $this->compress=$compress;
    else $this->compress=false;
}

function SetTitle($title) {
    //Title of document // Arrives as UTF-8
    $this->title = $title;
}

function SetSubject($subject) {
    //Subject of document
    $this->subject= $subject;
}

function SetAuthor($author) {
    //Author of document
    $this->author= $author;
}

function SetKeywords($keywords) {
    //Keywords of document
    $this->keywords= $keywords;
}

function SetCreator($creator) {
    //Creator of document
    $this->creator= $creator;
}


function SetAnchor2Bookmark($x) {
    $this->anchor2Bookmark = $x;
}

function AliasNbPages($alias='{nb}') {
    //Define an alias for total number of pages
    $this->aliasNbPg=$alias;
}

function AliasNbPageGroups($alias='{nbpg}') {
    //Define an alias for total number of pages in a group
    $this->aliasNbPgGp=$alias;
}

function SetAlpha($alpha, $bm='Normal', $return=false, $mode='B') {
// alpha: real value from 0 (transparent) to 1 (opaque)
// bm:    blend mode, one of the following:
//          Normal, Multiply, Screen, Overlay, Darken, Lighten, ColorDodge, ColorBurn,
//          HardLight, SoftLight, Difference, Exclusion, Hue, Saturation, Color, Luminosity
// set alpha for stroking (CA) and non-stroking (ca) operations
// mode determines F (fill) S (stroke) B (both)
    if (($this->PDFA || $this->PDFX) && $alpha!=1) { 
        if (($this->PDFA && !$this->PDFAauto) || ($this->PDFX && !$this->PDFXauto)) { $this->PDFAXwarnings[] = "Image opacity must be 100% (Opacity changed to 100%)"; }
        $alpha = 1; 
    }
    $a = array('BM'=>'/'.$bm);
    if ($mode=='F' || $mode='B') $a['ca'] = $alpha;
    if ($mode=='S' || $mode='B') $a['CA'] = $alpha;
    $gs = $this->AddExtGState($a);
    if ($return) { return sprintf('/GS%d gs', $gs); }
    else { $this->_out(sprintf('/GS%d gs', $gs)); }
}

function AddExtGState($parms) {
    $n = count($this->extgstates);
    // check if graphics state already exists
    for ($i=1; $i<=$n; $i++) {
      if (count($this->extgstates[$i]['parms']) == count($parms)) {
        $same = true;
        foreach($this->extgstates[$i]['parms'] AS $k=>$v) {
        if (!isset($parms[$k]) || $parms[$k] != $v) { $same = false; break; }
        }
        if ($same) { return $i; }
      }
    }
    $n++;
    $this->extgstates[$n]['parms'] = $parms;
    return $n;
}

function SetVisibility($v) {
    if (($this->PDFA || $this->PDFX) && $this->visibility!='visible') { $this->PDFAXwarnings[] = "Cannot set visibility to anything other than full when using PDFA or PDFX"; return ''; }
    else if (!$this->PDFA && !$this->PDFX)
        $this->pdf_version='1.5';
    if($this->visibility!='visible') {
        $this->_out('EMC');
        $this->hasOC=intval($this->hasOC ); // mPDF 5.6.01
    }
    if($v=='printonly') {
        $this->_out('/OC /OC1 BDC');
        $this->hasOC=($this->hasOC | 1);    // mPDF 5.6.01
    }
    elseif($v=='screenonly') {
        $this->_out('/OC /OC2 BDC');
        $this->hasOC=($this->hasOC | 2);    // mPDF 5.6.01
    }
    elseif($v=='hidden') {
        $this->_out('/OC /OC3 BDC');
        $this->hasOC=($this->hasOC | 4);    // mPDF 5.6.01
    }
    elseif($v!='visible')
        $this->Error('Incorrect visibility: '.$v);
    $this->visibility=$v;
}

function Error($msg) {
    //Fatal error
    header('Content-Type: text/html; charset=utf-8');
    die('<B>mPDF error: </B>'.$msg);
}

function Open() {
    //Begin document
    if($this->state==0) $this->_begindoc();
}

function Close() {
    if ($this->progressBar) { $this->UpdateProgressBar(2,'2','Closing last page'); }    // *PROGRESS-BAR*
    //Terminate document
    if($this->state==3) return;
    if($this->page==0) $this->AddPage($this->CurOrientation);
    if (count($this->cellBorderBuffer)) { $this->printcellbuffer(); }   // *TABLES*
    if ($this->tablebuffer) { $this->printtablebuffer(); }  // *TABLES*
/*-- COLUMNS --*/

    if ($this->ColActive) {
        $this->SetColumns(0);
        $this->ColActive = 0; 
        if (count($this->columnbuffer)) { $this->printcolumnbuffer(); }
    }
/*-- END COLUMNS --*/
    if (count($this->divbuffer)) { $this->printdivbuffer(); }

    // BODY Backgrounds
    $s = '';

    $s .= $this->PrintBodyBackgrounds();

    $s .= $this->PrintPageBackgrounds();
    $this->pages[$this->page] = preg_replace('/(___BACKGROUND___PATTERNS'.date('jY').')/', "\n".$s."\n".'\\1', $this->pages[$this->page]);
    $this->pageBackgrounds = array();

    if($this->visibility!='visible')
        $this->SetVisibility('visible');
    // mPDF 5.6.01 - LAYERS
    $this->EndLayer();

    if (!$this->tocontents || !$this->tocontents->TOCmark) { //Page footer
        $this->InFooter=true;
        $this->Footer();
        $this->InFooter=false;
    }
    if ($this->tocontents && ($this->tocontents->TOCmark || count($this->tocontents->m_TOC))) { $this->tocontents->insertTOC(); }   // *TOC*

    //Close page
    $this->_endpage();

    //Close document
    $this->_enddoc();
}

/*-- BACKGROUNDS --*/
function _resizeBackgroundImage($imw, $imh, $cw, $ch, $resize=0, $repx, $repy, $pba=array(), $size=array()) {   // mPDF 5.6.10
    // pba is background positioning area (from CSS background-origin) may not always be set [x,y,w,h]
    // size is from CSS3 background-size - takes precendence over old resize 
    //  $w - absolute length or % or auto or cover | contain
    //  $h - absolute length or % or auto or cover | contain
    // mPDF 5.6.10
    if (isset($pba['w'])) $cw = $pba['w'];
    if (isset($pba['h'])) $ch = $pba['h'];

    $cw = $cw*_MPDFK;
    $ch = $ch*_MPDFK;
    if (empty($size) && !$resize) { return array($imw, $imh, $repx, $repy); }

    // mPDF 5.6.10
    if (isset($size['w']) && $size['w']) {
        if ($size['w']=='contain') {
        // Scale the image, while preserving its intrinsic aspect ratio (if any), to the largest size such that both its width and its height can fit inside the background positioning area. 
        // Same as resize==3
            $h = $imh * $cw/$imw;
            $w = $cw;
            if ($h > $ch) {
                $w = $w * $ch/$h;
                $h = $ch;
            }
        }
        else if ($size['w']=='cover') {
        // Scale the image, while preserving its intrinsic aspect ratio (if any), to the smallest size such that both its width and its height can completely cover the background positioning area. 
            $h = $imh * $cw/$imw;
            $w = $cw;
            if ($h < $ch) {
                $w = $w * $h/$ch;
                $h = $ch;
            }
        }
        else {
            if (stristr($size['w'] ,'%')) {
                $size['w'] += 0; 
                $size['w'] /= 100; 
                $size['w'] = ($cw * $size['w']);
            }
            if (stristr($size['h'] ,'%')) {
                $size['h'] += 0; 
                $size['h'] /= 100; 
                $size['h'] = ($ch * $size['h']);
            }
            if ($size['w']=='auto' && $size['h']=='auto') {
                $w = $imw;
                $h = $imh;
            }
            else if ($size['w']=='auto' && $size['h']!='auto') {
                $w = $imw * $size['h']/$imh;
                $h = $size['h'];
            }
            else if ($size['w']!='auto' && $size['h']=='auto') {
                $h = $imh * $size['w']/$imw;
                $w = $size['w'];
            }
            else {
                $w = $size['w'];
                $h = $size['h'];
            }
        }
        return array($w, $h, $repx, $repy); 
    }
    else if ($resize==1 && $imw > $cw) {
        $h = $imh * $cw/$imw;
        return array($cw, $h, $repx, $repy); 
    }
    else if ($resize==2 && $imh > $ch) {
        $w = $imw * $ch/$imh;
        return array($w, $ch, $repx, $repy); 
    }
    else if ($resize==3) {
        $w = $imw;
        $h = $imh;
        if ($w > $cw) {
            $h = $h * $cw/$w;
            $w = $cw;
        }
        if ($h > $ch) {
            $w = $w * $ch/$h;
            $h = $ch;
        }
        return array($w, $h, $repx, $repy); 
    }
    else if ($resize==4) {
        $h = $imh * $cw/$imw;
        return array($cw, $h, $repx, $repy); 
    }
    else if ($resize==5) {
        $w = $imw * $ch/$imh;
        return array($w, $ch, $repx, $repy); 
    }
    else if ($resize==6) {
        return array($cw, $ch, $repx, $repy); 
    }
    return array($imw, $imh, $repx, $repy);
}


function SetBackground(&$properties, &$maxwidth) {
    // mPDF 5.6.10  5.6.11
    if (isset($properties['BACKGROUND-ORIGIN']) && ($properties['BACKGROUND-ORIGIN']=='border-box' || $properties['BACKGROUND-ORIGIN']== 'content-box')) { $origin = $properties['BACKGROUND-ORIGIN']; }
    else { $origin = 'padding-box'; }
    // mPDF 5.6.10
    if (isset($properties['BACKGROUND-SIZE'])) { 
        if (stristr($properties['BACKGROUND-SIZE'] ,'contain') ) { $bsw = $bsh = 'contain'; }
        else if (stristr($properties['BACKGROUND-SIZE'] ,'cover') ) { $bsw = $bsh = 'cover'; }
        else {
            $bsw = $bsh = 'auto';
            $sz = preg_split('/\s+/',trim($properties['BACKGROUND-SIZE']));
            if (count($sz)==2) { $bsw = $sz[0]; $bsh = $sz[1]; }
            else { $bsw = $sz[0]; }
            if (!stristr($bsw ,'%') && !stristr($bsw ,'auto') ) { $bsw = $this->ConvertSize($bsw ,$maxwidth,$this->FontSize); }
            if (!stristr($bsh ,'%') && !stristr($bsh ,'auto') ) { $bsh = $this->ConvertSize($bsh ,$maxwidth,$this->FontSize); }
        }
        $size = array('w'=>$bsw, 'h'=>$bsh);
    }
       if (preg_match('/(-moz-)*(repeating-)*(linear|radial)-gradient/',$properties['BACKGROUND-IMAGE'])) {
        return array('gradient'=>$properties['BACKGROUND-IMAGE'], 'origin'=>$origin, 'size'=>$size );   // mPDF 5.6.10
       }
       else {
        $file = $properties['BACKGROUND-IMAGE'];
        $sizesarray = $this->Image($file,0,0,0,0,'','',false, false, false, false, true);
        if (isset($sizesarray['IMAGE_ID'])) {
            $image_id = $sizesarray['IMAGE_ID'];
            $orig_w = $sizesarray['WIDTH']*_MPDFK;      // in user units i.e. mm
            $orig_h = $sizesarray['HEIGHT']*_MPDFK;     // (using $this->img_dpi)
            if (isset($properties['BACKGROUND-IMAGE-RESOLUTION'])) { 
                if (preg_match('/from-image/i', $properties['BACKGROUND-IMAGE-RESOLUTION']) && isset($sizesarray['set-dpi']) && $sizesarray['set-dpi']>0) {
                    $orig_w *= $this->img_dpi / $sizesarray['set-dpi'];
                    $orig_h *= $this->img_dpi / $sizesarray['set-dpi'];
                }
                else if (preg_match('/(\d+)dpi/i', $properties['BACKGROUND-IMAGE-RESOLUTION'], $m)) {
                    $dpi = $m[1]; 
                    if ($dpi > 0) {
                        $orig_w *= $this->img_dpi / $dpi;
                        $orig_h *= $this->img_dpi / $dpi;
                    }
                }
            }
            $x_repeat = true;
            $y_repeat = true;
            if (isset($properties['BACKGROUND-REPEAT'])) {
                if ($properties['BACKGROUND-REPEAT']=='no-repeat' || $properties['BACKGROUND-REPEAT']=='repeat-x') { $y_repeat = false; }
                if ($properties['BACKGROUND-REPEAT']=='no-repeat' || $properties['BACKGROUND-REPEAT']=='repeat-y') { $x_repeat = false; }
            }
            $x_pos = 0;
            $y_pos = 0;
            if (isset($properties['BACKGROUND-POSITION'])) { 
                $ppos = preg_split('/\s+/',$properties['BACKGROUND-POSITION']);
                $x_pos = $ppos[0];
                $y_pos = $ppos[1];
                if (!stristr($x_pos ,'%') ) { $x_pos = $this->ConvertSize($x_pos ,$maxwidth,$this->FontSize); }
                if (!stristr($y_pos ,'%') ) { $y_pos = $this->ConvertSize($y_pos ,$maxwidth,$this->FontSize); }
            }
            if (isset($properties['BACKGROUND-IMAGE-RESIZE'])) { $resize = $properties['BACKGROUND-IMAGE-RESIZE']; }
            else { $resize = 0; }
            if (isset($properties['BACKGROUND-IMAGE-OPACITY'])) { $opacity = $properties['BACKGROUND-IMAGE-OPACITY']; }
            else { $opacity = 1; }
            return array('image_id'=>$image_id, 'orig_w'=>$orig_w, 'orig_h'=>$orig_h, 'x_pos'=>$x_pos, 'y_pos'=>$y_pos, 'x_repeat'=>$x_repeat, 'y_repeat'=>$y_repeat, 'resize'=>$resize, 'opacity'=>$opacity, 'itype'=>$sizesarray['itype'], 'origin'=>$origin, 'size'=>$size );
        }
       }
       return false;
}
/*-- END BACKGROUNDS --*/

function PrintBodyBackgrounds() {
    $s = '';
    $clx = 0;
    $cly = 0;
    $clw = $this->w;
    $clh = $this->h;
    // If using bleed and trim margins in paged media
    if ($this->pageDim[$this->page]['outer_width_LR'] || $this->pageDim[$this->page]['outer_width_TB']) {
        $clx = $this->pageDim[$this->page]['outer_width_LR'] - $this->pageDim[$this->page]['bleedMargin'];
        $cly = $this->pageDim[$this->page]['outer_width_TB'] - $this->pageDim[$this->page]['bleedMargin'];
        $clw = $this->w - 2*$clx;
        $clh = $this->h - 2*$cly;
    }

    if ($this->bodyBackgroundColor) {
        $s .= 'q ' .$this->SetFColor($this->bodyBackgroundColor, true)."\n";
        if ($this->bodyBackgroundColor{0}==5) { // RGBa
            $s .= $this->SetAlpha(ord($this->bodyBackgroundColor{4})/100, 'Normal', true, 'F')."\n";
        }
        else if ($this->bodyBackgroundColor{0}==6) {    // CMYKa
            $s .= $this->SetAlpha(ord($this->bodyBackgroundColor{5})/100, 'Normal', true, 'F')."\n";
        }
        $s .= sprintf('%.3F %.3F %.3F %.3F re f Q', ($clx*_MPDFK), ($cly*_MPDFK),$clw*_MPDFK,$clh*_MPDFK)."\n";
    }

/*-- BACKGROUNDS --*/
    if ($this->bodyBackgroundGradient) { 
        $g = $this->grad->parseBackgroundGradient($this->bodyBackgroundGradient);
        if ($g) {
            $s .= $this->grad->Gradient($clx, $cly, $clw, $clh, (isset($g['gradtype']) ? $g['gradtype'] : null), $g['stops'], $g['colorspace'], $g['coords'], $g['extend'], true);
        }
    }
    if ($this->bodyBackgroundImage) {
       if ( $this->bodyBackgroundImage['gradient'] && preg_match('/(-moz-)*(repeating-)*(linear|radial)-gradient/', $this->bodyBackgroundImage['gradient'])) {
        $g = $this->grad->parseMozGradient( $this->bodyBackgroundImage['gradient']);
        if ($g) {
            $s .= $this->grad->Gradient($clx, $cly, $clw, $clh, $g['type'], $g['stops'], $g['colorspace'], $g['coords'], $g['extend'], true);
        }
       }
       else if ($this->bodyBackgroundImage['image_id']) {   // Background pattern
            $n = count($this->patterns)+1;
            // If using resize, uses TrimBox (not including the bleed)
            list($orig_w, $orig_h, $x_repeat, $y_repeat) = $this->_resizeBackgroundImage($this->bodyBackgroundImage['orig_w'], $this->bodyBackgroundImage['orig_h'], $clw, $clh, $this->bodyBackgroundImage['resize'], $this->bodyBackgroundImage['x_repeat'], $this->bodyBackgroundImage['y_repeat']);

            $this->patterns[$n] = array('x'=>$clx, 'y'=>$cly, 'w'=>$clw, 'h'=>$clh, 'pgh'=>$this->h, 'image_id'=>$this->bodyBackgroundImage['image_id'], 'orig_w'=>$orig_w, 'orig_h'=>$orig_h, 'x_pos'=>$this->bodyBackgroundImage['x_pos'], 'y_pos'=>$this->bodyBackgroundImage['y_pos'], 'x_repeat'=>$x_repeat, 'y_repeat'=>$y_repeat, 'itype'=>$this->bodyBackgroundImage['itype']);
            if (($this->bodyBackgroundImage['opacity']>0 || $this->bodyBackgroundImage['opacity']==='0') && $this->bodyBackgroundImage['opacity']<1) { $opac = $this->SetAlpha($this->bodyBackgroundImage['opacity'],'Normal',true); }
            else { $opac = ''; }
            $s .= sprintf('q /Pattern cs /P%d scn %s %.3F %.3F %.3F %.3F re f Q', $n, $opac, ($clx*_MPDFK), ($cly*_MPDFK),$clw*_MPDFK, $clh*_MPDFK) ."\n";
       }
    }
/*-- END BACKGROUNDS --*/
    return $s;
}


function PrintPageBackgrounds($adjustmenty=0) {
    $s = '';

    ksort($this->pageBackgrounds);
    foreach($this->pageBackgrounds AS $bl=>$pbs) {
        foreach ($pbs AS $pb) {
          if ((!isset($pb['image_id']) && !isset($pb['gradient'])) || isset($pb['shadowonly'])) {   // Background colour or boxshadow
            // mPDF 5.6.01  - LAYERS
            if($pb['z-index']>0) {
                $this->current_layer = $pb['z-index'];
                $s .= "\n".'/OCBZ-index /ZI'.$pb['z-index'].' BDC'."\n";
            }

            if($pb['visibility']!='visible') {
                if($pb['visibility']=='printonly') 
                    $s .= '/OC /OC1 BDC'."\n";
                else if($pb['visibility']=='screenonly')
                    $s .= '/OC /OC2 BDC'."\n";
                else if($pb['visibility']=='hidden')
                    $s .= '/OC /OC3 BDC'."\n";
            }
            // Box shadow
            if (isset($pb['shadow']) && $pb['shadow']) { $s .= $pb['shadow']."\n"; }
            if (isset($pb['clippath']) && $pb['clippath']) { $s .= $pb['clippath']."\n"; }
            $s .= 'q '.$this->SetFColor($pb['col'], true)."\n";
            if ($pb['col']{0}==5) { // RGBa
                $s .= $this->SetAlpha(ord($pb['col']{4})/100, 'Normal', true, 'F')."\n"; 
            }
            else if ($pb['col']{0}==6) {    // CMYKa
                $s .= $this->SetAlpha(ord($pb['col']{5})/100, 'Normal', true, 'F')."\n";
            }
            $s .= sprintf('%.3F %.3F %.3F %.3F re f Q',$pb['x']*_MPDFK,($this->h-$pb['y'])*_MPDFK,$pb['w']*_MPDFK,-$pb['h']*_MPDFK)."\n";
            if (isset($pb['clippath']) && $pb['clippath']) { $s .= 'Q'."\n"; }
            if($pb['visibility']!='visible')
                $s .= 'EMC'."\n";

            // mPDF 5.6.01  - LAYERS
            if($pb['z-index']>0) {
                $s .= "\n".'EMCBZ-index'."\n";
                $this->current_layer = 0;
            }
          }
        }
/*-- BACKGROUNDS --*/
        foreach ($pbs AS $pb) {
          // mPDF 5.6.01  - LAYERS
          if ((isset($pb['gradient']) && $pb['gradient']) || (isset($pb['image_id']) && $pb['image_id'])) {
            if($pb['z-index']>0) {
                $this->current_layer = $pb['z-index'];
                $s .= "\n".'/OCGZ-index /ZI'.$pb['z-index'].' BDC'."\n";
            }
            if($pb['visibility']!='visible') {
                if($pb['visibility']=='printonly') 
                    $s .= '/OC /OC1 BDC'."\n";
                else if($pb['visibility']=='screenonly')
                    $s .= '/OC /OC2 BDC'."\n";
                else if($pb['visibility']=='hidden')
                    $s .= '/OC /OC3 BDC'."\n";
            }
          }
          if (isset($pb['gradient']) && $pb['gradient']) {
            if (isset($pb['clippath']) && $pb['clippath']) { $s .= $pb['clippath']."\n"; }
            $s .= $this->grad->Gradient($pb['x'], $pb['y'], $pb['w'], $pb['h'], $pb['gradtype'], $pb['stops'], $pb['colorspace'], $pb['coords'], $pb['extend'], true);
            if (isset($pb['clippath']) && $pb['clippath']) { $s .= 'Q'."\n"; }
          }
          else if (isset($pb['image_id']) && $pb['image_id']) { // Background Image
            $pb['y'] -= $adjustmenty; 
            $pb['h'] += $adjustmenty; 
            $n = count($this->patterns)+1;
            list($orig_w, $orig_h, $x_repeat, $y_repeat) = $this->_resizeBackgroundImage($pb['orig_w'], $pb['orig_h'], $pb['w'], $pb['h'], $pb['resize'], $pb['x_repeat'], $pb['y_repeat'], $pb['bpa'], $pb['size']);   // mPDF 5.6.10
            $this->patterns[$n] = array('x'=>$pb['x'], 'y'=>$pb['y'], 'w'=>$pb['w'], 'h'=>$pb['h'], 'pgh'=>$this->h, 'image_id'=>$pb['image_id'], 'orig_w'=>$orig_w, 'orig_h'=>$orig_h, 'x_pos'=>$pb['x_pos'], 'y_pos'=>$pb['y_pos'], 'x_repeat'=>$x_repeat, 'y_repeat'=>$y_repeat, 'itype'=>$pb['itype'], 'bpa'=>$pb['bpa']);  // mPDF 5.6.10
            $x = $pb['x']*_MPDFK;
            $y = ($this->h - $pb['y'])*_MPDFK;
            $w = $pb['w']*_MPDFK;
            $h = -$pb['h']*_MPDFK;
            if (isset($pb['clippath']) && $pb['clippath']) { $s .= $pb['clippath']."\n"; }
            if ($this->writingHTMLfooter || $this->writingHTMLheader) { // Write each (tiles) image rather than use as a pattern
                $iw = $pb['orig_w']/_MPDFK;
                $ih = $pb['orig_h']/_MPDFK;

                $w = $pb['w'];
                $h = $pb['h'];
                $x0 = $pb['x'];
                $y0 = $pb['y'];

                // mPDF 5.6.11
                if (isset($pb['bpa']) && $pb['bpa']) {
                    $w = $pb['bpa']['w'];
                    $h = $pb['bpa']['h'];
                    $x0 = $pb['bpa']['x'];
                    $y0 = $pb['bpa']['y'];
                }

                // mPDF 5.6.11
                if (isset($pb['size']['w']) && $pb['size']['w']) {
                    $size = $pb['size'];

                    if ($size['w']=='contain') {
                    // Scale the image, while preserving its intrinsic aspect ratio (if any), to the largest size such that both its width and its height can fit inside the background positioning area. 
                    // Same as resize==3
                        $ih = $ih * $pb['bpa']['w']/$iw;
                        $iw = $pb['bpa']['w'];
                        if ($ih > $pb['bpa']['h']) {
                            $iw = $iw * $pb['bpa']['h']/$ih;
                            $ih = $pb['bpa']['h'];
                        }
                    }
                    else if ($size['w']=='cover') {
                    // Scale the image, while preserving its intrinsic aspect ratio (if any), to the smallest size such that both its width and its height can completely cover the background positioning area. 
                        $ih = $ih * $pb['bpa']['w']/$iw;
                        $iw = $pb['bpa']['w'];
                        if ($ih < $pb['bpa']['h']) {
                            $iw = $iw * $ih/$pb['bpa']['h'];
                            $ih = $pb['bpa']['h'];
                        }
                    }
                    else {
                        if (stristr($size['w'] ,'%')) {
                            $size['w'] += 0; 
                            $size['w'] /= 100; 
                            $size['w'] = ($pb['bpa']['w'] * $size['w']);
                        }
                        if (stristr($size['h'] ,'%')) {
                            $size['h'] += 0; 
                            $size['h'] /= 100; 
                            $size['h'] = ($pb['bpa']['h'] * $size['h']);
                        }
                        if ($size['w']=='auto' && $size['h']=='auto') {
                            $iw = $iw;
                            $ih = $ih;
                        }
                        else if ($size['w']=='auto' && $size['h']!='auto') {
                            $iw = $iw * $size['h']/$ih;
                            $ih = $size['h'];
                        }
                        else if ($size['w']!='auto' && $size['h']=='auto') {
                            $ih = $ih * $size['w']/$iw;
                            $iw = $size['w'];
                        }
                        else {
                            $iw = $size['w'];
                            $ih = $size['h'];
                        }
                    }
                }

                // Number to repeat
                if ($pb['x_repeat']) { $nx = ceil($pb['w']/$iw)+1; }    // mPDF 5.6.11
                else { $nx = 1; }
                if ($pb['y_repeat']) { $ny = ceil($pb['h']/$ih)+1; }    // mPDF 5.6.11
                else { $ny = 1; }

                $x_pos = $pb['x_pos'];
                if (stristr($x_pos ,'%') ) { 
                    $x_pos += 0; 
                    $x_pos /= 100; 
                    $x_pos = ($pb['bpa']['w'] * $x_pos) - ($iw * $x_pos);   // mPDF 5.6.11
                }
                $y_pos = $pb['y_pos'];
                if (stristr($y_pos ,'%') ) { 
                    $y_pos += 0; 
                    $y_pos /= 100; 
                    $y_pos = ($pb['bpa']['h'] * $y_pos) - ($ih * $y_pos);   // mPDF 5.6.11
                }
                if ($nx>1) {
                    while($x_pos>($pb['x']-$pb['bpa']['x'])) { $x_pos -= $iw; } // mPDF 5.6.11
                }
                if ($ny>1) {
                    while($y_pos>($pb['y']-$pb['bpa']['y'])) { $y_pos -= $ih; } // mPDF 5.6.11
                }
                for($xi=0;$xi<$nx;$xi++) {
                  for($yi=0;$yi<$ny;$yi++) {
                    $x = $x0 + $x_pos + ($iw*$xi);
                    $y = $y0 + $y_pos + ($ih*$yi);
                    if ($pb['opacity']>0 && $pb['opacity']<1) { $opac = $this->SetAlpha($pb['opacity'],'Normal',true); }
                    else { $opac = ''; }
                    $s .= sprintf("q %s %.3F 0 0 %.3F %.3F %.3F cm /I%d Do Q", $opac,$iw*_MPDFK,$ih*_MPDFK,$x*_MPDFK,($this->h-($y+$ih))*_MPDFK,$pb['image_id']) ."\n";
                  }
                }
            }
            else {
                if (($pb['opacity']>0 || $pb['opacity']==='0') && $pb['opacity']<1) { $opac = $this->SetAlpha($pb['opacity'],'Normal',true); }
                else { $opac = ''; }
                $s .= sprintf('q /Pattern cs /P%d scn %s %.3F %.3F %.3F %.3F re f Q', $n, $opac, $x, $y, $w, $h) ."\n";
            }
            if (isset($pb['clippath']) && $pb['clippath']) { $s .= 'Q'."\n"; }
          }
          if ((isset($pb['gradient']) && $pb['gradient']) || (isset($pb['image_id']) && $pb['image_id'])) {
            if($pb['visibility']!='visible')
                $s .= 'EMC'."\n";

            // mPDF 5.6.01  - LAYERS
            if($pb['z-index']>0) {
                $s .= "\n".'EMCGZ-index'."\n";
                $this->current_layer = 0;
            }
          }

        }
/*-- END BACKGROUNDS --*/
    }
    return $s;
}

function PrintTableBackgrounds($adjustmenty=0) {
    $s = '';
/*-- BACKGROUNDS --*/
    ksort($this->tableBackgrounds);
    foreach($this->tableBackgrounds AS $bl=>$pbs) {
        foreach ($pbs AS $pb) {
         if ((!isset($pb['gradient']) || !$pb['gradient']) && (!isset($pb['image_id']) || !$pb['image_id'])) {
            $s .= 'q '.$this->SetFColor($pb['col'], true)."\n";
            if ($pb['col']{0}==5) { // RGBa
                $s .= $this->SetAlpha(ord($pb['col']{4})/100, 'Normal', true, 'F')."\n"; 
            }
            else if ($pb['col']{0}==6) {    // CMYKa
                $s .= $this->SetAlpha(ord($pb['col']{5})/100, 'Normal', true, 'F')."\n";
            }
            $s .= sprintf('%.3F %.3F %.3F %.3F re %s Q',$pb['x']*_MPDFK,($this->h-$pb['y'])*_MPDFK,$pb['w']*_MPDFK,-$pb['h']*_MPDFK,'f')."\n";
          }
         if (isset($pb['gradient']) && $pb['gradient']) {
            if (isset($pb['clippath']) && $pb['clippath']) { $s .= $pb['clippath']."\n"; }
            $s .= $this->grad->Gradient($pb['x'], $pb['y'], $pb['w'], $pb['h'], $pb['gradtype'], $pb['stops'], $pb['colorspace'], $pb['coords'], $pb['extend'], true);
            if (isset($pb['clippath']) && $pb['clippath']) { $s .= 'Q'."\n"; }
          }
          if (isset($pb['image_id']) && $pb['image_id']) {  // Background pattern
            $pb['y'] -= $adjustmenty; 
            $pb['h'] += $adjustmenty; 
            $n = count($this->patterns)+1;
            list($orig_w, $orig_h, $x_repeat, $y_repeat) = $this->_resizeBackgroundImage($pb['orig_w'], $pb['orig_h'], $pb['w'], $pb['h'], $pb['resize'], $pb['x_repeat'], $pb['y_repeat']);
            $this->patterns[$n] = array('x'=>$pb['x'], 'y'=>$pb['y'], 'w'=>$pb['w'], 'h'=>$pb['h'], 'pgh'=>$this->h, 'image_id'=>$pb['image_id'], 'orig_w'=>$orig_w, 'orig_h'=>$orig_h, 'x_pos'=>$pb['x_pos'], 'y_pos'=>$pb['y_pos'], 'x_repeat'=>$x_repeat, 'y_repeat'=>$y_repeat, 'itype'=>$pb['itype']);
            $x = $pb['x']*_MPDFK;
            $y = ($this->h - $pb['y'])*_MPDFK;
            $w = $pb['w']*_MPDFK;
            $h = -$pb['h']*_MPDFK;
            if (isset($pb['clippath']) && $pb['clippath']) { $s .= $pb['clippath']."\n"; }
            if ($pb['opacity']>0 && $pb['opacity']<1) { $opac = $this->SetAlpha($pb['opacity'],'Normal',true); }
            else { $opac = ''; }
            $s .= sprintf('q /Pattern cs /P%d scn %s %.3F %.3F %.3F %.3F re f Q', $n, $opac, $x, $y, $w, $h) ."\n";
            if (isset($pb['clippath']) && $pb['clippath']) { $s .= 'Q'."\n"; }
          }
        }
    }
/*-- END BACKGROUNDS --*/
    return $s;
}

// mPDF 5.6.01 - LAYERS
function BeginLayer($id) {
    if($this->current_layer>0) $this->EndLayer();
    if ($id < 1) { return false; }
    if (!isset($this->layers[$id])) { 
        $this->layers[$id] = array('name'=>'Layer '.($id) );
        if (($this->PDFA || $this->PDFX)) { $this->PDFAXwarnings[] = "Cannot use layers when using PDFA or PDFX"; return ''; }
        else if (!$this->PDFA && !$this->PDFX) { $this->pdf_version='1.5'; }
    }
    $this->current_layer = $id;
    $this->_out('/OCZ-index /ZI'.$id.' BDC');

    $this->pageoutput[$this->page] = array();
}

function EndLayer() {
    if($this->current_layer>0) {
        $this->_out('EMCZ-index');
        $this->current_layer = 0;
    }
}



// Depracated - can use AddPage for all
function AddPages($orientation='',$condition='', $resetpagenum='', $pagenumstyle='', $suppress='',$mgl='',$mgr='',$mgt='',$mgb='',$mgh='',$mgf='',$ohname='',$ehname='',$ofname='',$efname='',$ohvalue=0,$ehvalue=0,$ofvalue=0,$efvalue=0,$pagesel='',$newformat='')
{
    $this->AddPage($orientation,$condition,$resetpagenum, $pagenumstyle, $suppress,$mgl,$mgr,$mgt,$mgb,$mgh,$mgf, $ohname, $ehname, $ofname, $efname, $ohvalue, $ehvalue, $ofvalue, $efvalue,$pagesel,$newformat); 
}


function AddPageByArray($a) {
    if (!is_array($a)) { $a = array(); }
    $orientation = (isset($a['orientation']) ? $a['orientation'] : '');
    $condition = (isset($a['condition']) ? $a['condition'] : (isset($a['type']) ? $a['type'] : ''));
    $resetpagenum = (isset($a['resetpagenum']) ? $a['resetpagenum'] : '');
    $pagenumstyle = (isset($a['pagenumstyle']) ? $a['pagenumstyle'] : '');
    $suppress = (isset($a['suppress']) ? $a['suppress'] : '');
    $mgl = (isset($a['mgl']) ? $a['mgl'] : (isset($a['margin-left']) ? $a['margin-left'] : ''));
    $mgr = (isset($a['mgr']) ? $a['mgr'] : (isset($a['margin-right']) ? $a['margin-right'] : ''));
    $mgt = (isset($a['mgt']) ? $a['mgt'] : (isset($a['margin-top']) ? $a['margin-top'] : ''));
    $mgb = (isset($a['mgb']) ? $a['mgb'] : (isset($a['margin-bottom']) ? $a['margin-bottom'] : ''));
    $mgh = (isset($a['mgh']) ? $a['mgh'] : (isset($a['margin-header']) ? $a['margin-header'] : ''));
    $mgf = (isset($a['mgf']) ? $a['mgf'] : (isset($a['margin-footer']) ? $a['margin-footer'] : ''));
    $ohname = (isset($a['ohname']) ? $a['ohname'] : (isset($a['odd-header-name']) ? $a['odd-header-name'] : ''));
    $ehname = (isset($a['ehname']) ? $a['ehname'] : (isset($a['even-header-name']) ? $a['even-header-name'] : ''));
    $ofname = (isset($a['ofname']) ? $a['ofname'] : (isset($a['odd-footer-name']) ? $a['odd-footer-name'] : ''));
    $efname = (isset($a['efname']) ? $a['efname'] : (isset($a['even-footer-name']) ? $a['even-footer-name'] : ''));
    $ohvalue = (isset($a['ohvalue']) ? $a['ohvalue'] : (isset($a['odd-header-value']) ? $a['odd-header-value'] : 0));
    $ehvalue = (isset($a['ehvalue']) ? $a['ehvalue'] : (isset($a['even-header-value']) ? $a['even-header-value'] : 0));
    $ofvalue = (isset($a['ofvalue']) ? $a['ofvalue'] : (isset($a['odd-footer-value']) ? $a['odd-footer-value'] : 0));
    $efvalue = (isset($a['efvalue']) ? $a['efvalue'] : (isset($a['even-footer-value']) ? $a['even-footer-value'] : 0));
    $pagesel = (isset($a['pagesel']) ? $a['pagesel'] : (isset($a['pageselector']) ? $a['pageselector'] : ''));
    $newformat = (isset($a['newformat']) ? $a['newformat'] : (isset($a['sheet-size']) ? $a['sheet-size'] : ''));

    $this->AddPage($orientation,$condition,$resetpagenum, $pagenumstyle, $suppress,$mgl,$mgr,$mgt,$mgb,$mgh,$mgf, $ohname, $ehname, $ofname, $efname, $ohvalue, $ehvalue, $ofvalue, $efvalue,$pagesel,$newformat);

}


function AddPage($orientation='',$condition='', $resetpagenum='', $pagenumstyle='', $suppress='',$mgl='',$mgr='',$mgt='',$mgb='',$mgh='',$mgf='',$ohname='',$ehname='',$ofname='',$efname='',$ohvalue=0,$ehvalue=0,$ofvalue=0,$efvalue=0,$pagesel='',$newformat='')
{
/*-- CSS-FLOAT --*/
    // Float DIV
    // Cannot do with columns on, or if any change in page orientation/margins etc.
    // If next page already exists - i.e background /headers and footers already written
    if ($this->state > 0 && $this->page < count($this->pages)) {
        $bak_cml = $this->cMarginL;
        $bak_cmr = $this->cMarginR; 
        $bak_dw = $this->divwidth;
        // Paint Div Border if necessary
        if ($this->blklvl > 0) {
            $save_tr = $this->table_rotate; // *TABLES*
            $this->table_rotate = 0;    // *TABLES*
            if ($this->y == $this->blk[$this->blklvl]['y0']) {  $this->blk[$this->blklvl]['startpage']++; }
            if (($this->y > $this->blk[$this->blklvl]['y0']) || $this->flowingBlockAttr['is_table'] ) { $toplvl = $this->blklvl; }
            else { $toplvl = $this->blklvl-1; }
            $sy = $this->y;
            for ($bl=1;$bl<=$toplvl;$bl++) {
                $this->PaintDivBB('pagebottom',0,$bl);
            }
            $this->y = $sy;
            $this->table_rotate = $save_tr; // *TABLES*
        }
        $s = $this->PrintPageBackgrounds();

        // Writes after the marker so not overwritten later by page background etc.
        $this->pages[$this->page] = preg_replace('/(___BACKGROUND___PATTERNS'.date('jY').')/', '\\1'."\n".$s."\n", $this->pages[$this->page]);
        $this->pageBackgrounds = array();
        $family=$this->FontFamily;
        $style=$this->FontStyle.($this->U ? 'U' : '').($this->S ? 'S' : '');
        $size=$this->FontSizePt;
        $lw=$this->LineWidth;
        $dc=$this->DrawColor;
        $fc=$this->FillColor;
        $tc=$this->TextColor;
        $cf=$this->ColorFlag;

        $this->printfloatbuffer();

        //Move to next page
        $this->page++;
        $this->ResetMargins();
        $this->SetAutoPageBreak($this->autoPageBreak,$this->bMargin);
        $this->x=$this->lMargin;
        $this->y=$this->tMargin;
        $this->FontFamily='';
        $this->_out('2 J');
        $this->LineWidth=$lw;
        $this->_out(sprintf('%.3F w',$lw*_MPDFK));
        if($family) $this->SetFont($family,$style,$size,true,true);
        $this->DrawColor=$dc;
        if($dc!=$this->defDrawColor) $this->_out($dc);
        $this->FillColor=$fc;
        if($fc!=$this->defFillColor) $this->_out($fc);
        $this->TextColor=$tc;
        $this->ColorFlag=$cf;
        for($bl=1;$bl<=$this->blklvl;$bl++) {
            $this->blk[$bl]['y0'] = $this->y;
            // Don't correct more than once for background DIV containing a Float
            if (!isset($this->blk[$bl]['marginCorrected'][$this->page])) { $this->blk[$bl]['x0'] += $this->MarginCorrection; }
            $this->blk[$bl]['marginCorrected'][$this->page] = true; 
        }
        $this->cMarginL = $bak_cml;
        $this->cMarginR = $bak_cmr;
        $this->divwidth = $bak_dw;
        return '';
    }
/*-- END CSS-FLOAT --*/

    //Start a new page
    if($this->state==0) $this->Open();

    $bak_cml = $this->cMarginL;
    $bak_cmr = $this->cMarginR; 
    $bak_dw = $this->divwidth;


    $bak_lh = $this->lineheight;

    $orientation = substr(strtoupper($orientation),0,1);
    $condition = strtoupper($condition);


    if ($condition == 'NEXT-EVEN') {    // always adds at least one new page to create an Even page
       if (!$this->mirrorMargins) { $condition = ''; }
       else { 
        if ($pagesel) { $pbch = $pagesel; $pagesel = ''; }  // *CSS-PAGE*
        else { $pbch = false; } // *CSS-PAGE*
        $this->AddPage($this->CurOrientation,'O'); 
        if ($pbch ) { $pagesel = $pbch; }   // *CSS-PAGE*
        $condition = ''; 
       }
    }
    if ($condition == 'NEXT-ODD') { // always adds at least one new page to create an Odd page
       if (!$this->mirrorMargins) { $condition = ''; }
       else { 
        if ($pagesel) { $pbch = $pagesel; $pagesel = ''; }  // *CSS-PAGE*
        else { $pbch = false; } // *CSS-PAGE*
        $this->AddPage($this->CurOrientation,'E'); 
        if ($pbch ) { $pagesel = $pbch; }   // *CSS-PAGE*
        $condition = ''; 
       }
    }


    if ($condition == 'E') {    // only adds new page if needed to create an Even page
       if (!$this->mirrorMargins || ($this->page)%2==0) { return false; }
    }
    if ($condition == 'O') {    // only adds new page if needed to create an Odd page
       if (!$this->mirrorMargins || ($this->page)%2==1) { return false; }
    }

    if ($resetpagenum || $pagenumstyle || $suppress) {
        $this->PageNumSubstitutions[] = array('from'=>($this->page+1), 'reset'=> $resetpagenum, 'type'=>$pagenumstyle, 'suppress'=>$suppress);
    }


    $save_tr = $this->table_rotate; // *TABLES*
    $this->table_rotate = 0;    // *TABLES*
    $save_kwt = $this->kwt;
    $this->kwt = 0;
    // mPDF 5.6.01 - LAYERS
    $save_layer = $this->current_layer;
    $save_vis = $this->visibility;

    if($this->visibility!='visible')
        $this->SetVisibility('visible');
    // mPDF 5.6.01 - LAYERS
    $this->EndLayer();

    // Paint Div Border if necessary
    //PAINTS BACKGROUND COLOUR OR BORDERS for DIV - DISABLED FOR COLUMNS (cf. AcceptPageBreak) AT PRESENT in ->PaintDivBB
    if (!$this->ColActive && $this->blklvl > 0) {
        if (isset($this->blk[$this->blklvl]['y0']) && $this->y == $this->blk[$this->blklvl]['y0']) {  
            if (isset($this->blk[$this->blklvl]['startpage'])) { $this->blk[$this->blklvl]['startpage']++; }
            else { $this->blk[$this->blklvl]['startpage'] = 1; }
        }
        if ((isset($this->blk[$this->blklvl]['y0']) && $this->y > $this->blk[$this->blklvl]['y0']) || $this->flowingBlockAttr['is_table'] ) { $toplvl = $this->blklvl; }
        else { $toplvl = $this->blklvl-1; }
        $sy = $this->y;
        for ($bl=1;$bl<=$toplvl;$bl++) {

            // mPDF 5.6.01 - LAYERS
            if ($this->blk[$bl]['z-index']>0) {
                $this->BeginLayer($this->blk[$bl]['z-index']);
            }
            if (isset($this->blk[$bl]['visibility']) && $this->blk[$bl]['visibility'] && $this->blk[$bl]['visibility']!='visible') {
                $this->SetVisibility($this->blk[$bl]['visibility']);
            }

            $this->PaintDivBB('pagebottom',0,$bl);
        }
        $this->y = $sy;
        // RESET block y0 and x0 - see below
    }

    if($this->visibility!='visible')
        $this->SetVisibility('visible');
    // mPDF 5.6.01 - LAYERS
    $this->EndLayer();

    // BODY Backgrounds
    if ($this->page > 0) {
        $s = '';
        $s .= $this->PrintBodyBackgrounds();

        $s .= $this->PrintPageBackgrounds();
        $this->pages[$this->page] = preg_replace('/(___BACKGROUND___PATTERNS'.date('jY').')/', "\n".$s."\n".'\\1', $this->pages[$this->page]);
        $this->pageBackgrounds = array();
    }

    $save_kt = $this->keep_block_together;
    $this->keep_block_together = 0;

    $save_cols = false;
/*-- COLUMNS --*/
    if ($this->ColActive) {
        $save_cols = true;
        $save_nbcol = $this->NbCol; // other values of gap and vAlign will not change by setting Columns off
        $this->SetColumns(0);
    }
/*-- END COLUMNS --*/


    $family=$this->FontFamily;
    $style=$this->FontStyle.($this->U ? 'U' : '').($this->S ? 'S' : '');
    $size=$this->FontSizePt;
    $this->ColumnAdjust = true; // enables column height adjustment for the page
    $lw=$this->LineWidth;
    $dc=$this->DrawColor;
    $fc=$this->FillColor;
    $tc=$this->TextColor;
    $cf=$this->ColorFlag;
    if($this->page>0)
    {
        //Page footer
        $this->InFooter=true;

        $this->Reset();
        $this->pageoutput[$this->page] = array();

        $this->Footer();
        //Close page
        $this->_endpage();
    }


    //Start new page
    $this->_beginpage($orientation,$mgl,$mgr,$mgt,$mgb,$mgh,$mgf,$ohname,$ehname,$ofname,$efname,$ohvalue,$ehvalue,$ofvalue,$efvalue,$pagesel,$newformat);
    if ($this->docTemplate) {
        $pagecount = $this->SetSourceFile($this->docTemplate);
        if (($this->page - $this->docTemplateStart) > $pagecount) {
            if ($this->docTemplateContinue) { 
                $tplIdx = $this->ImportPage($pagecount);
                $this->UseTemplate($tplIdx);
            }
        }
        else {
            $tplIdx = $this->ImportPage(($this->page - $this->docTemplateStart));
            $this->UseTemplate($tplIdx);
        }
    }
    if ($this->pageTemplate) {
        $this->UseTemplate($this->pageTemplate);
    }

    // Tiling Patterns
    $this->_out('___PAGE___START'.date('jY'));
    $this->_out('___BACKGROUND___PATTERNS'.date('jY'));
    $this->_out('___HEADER___MARKER'.date('jY'));
    $this->pageBackgrounds = array();

    //Set line cap style to square
    $this->SetLineCap(2);
    //Set line width
    $this->LineWidth=$lw;
    $this->_out(sprintf('%.3F w',$lw*_MPDFK));
    //Set font
    if($family) $this->SetFont($family,$style,$size,true,true); // forces write
    //Set colors
    $this->DrawColor=$dc;
    if($dc!=$this->defDrawColor) $this->_out($dc);
    $this->FillColor=$fc;
    if($fc!=$this->defFillColor) $this->_out($fc);
    $this->TextColor=$tc;
    $this->ColorFlag=$cf;

    //Page header
    $this->Header();

    //Restore line width
    if($this->LineWidth!=$lw)
    {
        $this->LineWidth=$lw;
        $this->_out(sprintf('%.3F w',$lw*_MPDFK));
    }
    //Restore font
    if($family) $this->SetFont($family,$style,$size,true,true); // forces write
    //Restore colors
    if($this->DrawColor!=$dc)
    {
        $this->DrawColor=$dc;
        $this->_out($dc);
    }
    if($this->FillColor!=$fc)
    {
        $this->FillColor=$fc;
        $this->_out($fc);
    }
    $this->TextColor=$tc;
    $this->ColorFlag=$cf;
    $this->InFooter=false;

    // mPDF 5.6.01 - LAYERS
    if ($save_layer>0)
        $this->BeginLayer($save_layer);

    if($save_vis!='visible')
        $this->SetVisibility($save_vis);

/*-- COLUMNS --*/
    if ($save_cols) {
        // Restore columns
        $this->SetColumns($save_nbcol,$this->colvAlign,$this->ColGap);
    }
    if ($this->ColActive) { $this->SetCol(0); }
/*-- END COLUMNS --*/


    //RESET BLOCK BORDER TOP
    if (!$this->ColActive) {
        for($bl=1;$bl<=$this->blklvl;$bl++) {
            $this->blk[$bl]['y0'] = $this->y;
            if (isset($this->blk[$bl]['x0'])) { $this->blk[$bl]['x0'] += $this->MarginCorrection; }
            else { $this->blk[$bl]['x0'] = $this->MarginCorrection; }
            // Added mPDF 3.0 Float DIV
            $this->blk[$bl]['marginCorrected'][$this->page] = true; 
        }
    }


    $this->table_rotate = $save_tr; // *TABLES*
    $this->kwt = $save_kwt;

    $this->keep_block_together = $save_kt ;

    $this->cMarginL = $bak_cml;
    $this->cMarginR = $bak_cmr;
    $this->divwidth = $bak_dw;

    $this->lineheight = $bak_lh;
}


function PageNo() {
    //Get current page number
    return $this->page;
}

function AddSpotColorsFromFile($file) {
    $colors = @file($file) or die("Cannot load spot colors file - ".$file);
    foreach($colors AS $sc) {
        list($name, $c, $m, $y, $k) = preg_split("/\t/",$sc);
        $c = intval($c);
        $m = intval($m);
        $y = intval($y);
        $k = intval($k);
        $this->AddSpotColor($name, $c, $m, $y, $k);
    }
}

function AddSpotColor($name, $c, $m, $y, $k) {
    $name = strtoupper(trim($name));
    if(!isset($this->spotColors[$name])) {
        $i=count($this->spotColors)+1;
        $this->spotColors[$name]=array('i'=>$i,'c'=>$c,'m'=>$m,'y'=>$y,'k'=>$k);
        $this->spotColorIDs[$i]=$name;
    }
}

function SetColor($col, $type='') {
    $out = '';
    if ($col{0}==3 || $col{0}==5) { // RGB / RGBa
        $out = sprintf('%.3F %.3F %.3F rg',ord($col{1})/255,ord($col{2})/255,ord($col{3})/255);
    }
    else if ($col{0}==1) {  // GRAYSCALE
        $out = sprintf('%.3F g',ord($col{1})/255);
    }
    else if ($col{0}==2) {  // SPOT COLOR
        $out = sprintf('/CS%d cs %.3F scn',ord($col{1}),ord($col{2})/100);
    }
    else if ($col{0}==4 || $col{0}==6) {    // CMYK / CMYKa
        $out = sprintf('%.3F %.3F %.3F %.3F k', ord($col{1})/100, ord($col{2})/100, ord($col{3})/100, ord($col{4})/100);
    }
    if ($type=='Draw') { $out = strtoupper($out); } // e.g. rg => RG
    else if ($type=='CodeOnly') { $out = preg_replace('/\s(rg|g|k)/','',$out); }
    return $out; 
}


function SetDColor($col, $return=false) {
    $out = $this->SetColor($col, 'Draw');
    if ($return) { return $out; }
    if ($out=='') { return ''; }
    $this->DrawColor = $out;
    if($this->page>0 && ((isset($this->pageoutput[$this->page]['DrawColor']) && $this->pageoutput[$this->page]['DrawColor'] != $this->DrawColor) || !isset($this->pageoutput[$this->page]['DrawColor']) || $this->keep_block_together)) { $this->_out($this->DrawColor); }
    $this->pageoutput[$this->page]['DrawColor'] = $this->DrawColor;
}

function SetFColor($col, $return=false) {
    $out = $this->SetColor($col, 'Fill');
    if ($return) { return $out; }
    if ($out=='') { return ''; }
    $this->FillColor = $out;
    $this->ColorFlag = ($out != $this->TextColor);
    if($this->page>0 && ((isset($this->pageoutput[$this->page]['FillColor']) && $this->pageoutput[$this->page]['FillColor'] != $this->FillColor) || !isset($this->pageoutput[$this->page]['FillColor']) || $this->keep_block_together)) { $this->_out($this->FillColor); }
    $this->pageoutput[$this->page]['FillColor'] = $this->FillColor;
}

function SetTColor($col, $return=false) {
    $out = $this->SetColor($col, 'Text');
    if ($return) { return $out; }
    if ($out=='') { return ''; }
    $this->TextColor = $out;
    $this->ColorFlag = ($this->FillColor != $out);
} 


function SetDrawColor($r,$g=-1,$b=-1,$col4=-1, $return=false) {
    //Set color for all stroking operations
    $col = array();
    if(($r==0 and $g==0 and $b==0 && $col4 == -1) or $g==-1) { $col = $this->ConvertColor($r); }
    else if ($col4 == -1) { $col = $this->ConvertColor('rgb('.$r.','.$g.','.$b.')'); }
    else { $col = $this->ConvertColor('cmyk('.$r.','.$g.','.$b.','.$col4.')'); }
    $out = $this->SetDColor($col, $return);
    return $out;
}

function SetFillColor($r,$g=-1,$b=-1,$col4=-1, $return=false) {
    //Set color for all filling operations
    $col = array();
    if(($r==0 and $g==0 and $b==0 && $col4 == -1) or $g==-1) { $col = $this->ConvertColor($r); }
    else if ($col4 == -1) { $col = $this->ConvertColor('rgb('.$r.','.$g.','.$b.')'); }
    else { $col = $this->ConvertColor('cmyk('.$r.','.$g.','.$b.','.$col4.')'); }
    $out = $this->SetFColor($col, $return);
    return $out;
}

function SetTextColor($r,$g=-1,$b=-1,$col4=-1, $return=false) {
    //Set color for text
    $col = array();
    if(($r==0 and $g==0 and $b==0 && $col4 == -1) or $g==-1) { $col = $this->ConvertColor($r); }
    else if ($col4 == -1) { $col = $this->ConvertColor('rgb('.$r.','.$g.','.$b.')'); }
    else { $col = $this->ConvertColor('cmyk('.$r.','.$g.','.$b.','.$col4.')'); }
    $out = $this->SetTColor($col, $return);
    return $out;
}

function _getCharWidth(&$cw, $u, $isdef=true) {
    if ($u==0) { $w = false; }
    else { $w = (ord($cw[$u*2]) << 8) + ord($cw[$u*2+1]); }
    if ($w == 65535) { return 0; }
    else if ($w) { return $w; }
    else if ($isdef) { return false; }
    else { return 0; }
}

function _charDefined(&$cw, $u) {
    if ($u==0) { return false; }
    $w = (ord($cw[$u*2]) << 8) + ord($cw[$u*2+1]);
    if ($w) { return true; }
    else { return false; }
}

function GetCharWidthCore($c) {
    //Get width of a single character in the current Core font
    $c = (string)$c;
    $w = 0;
    // Soft Hyphens chr(173)
    if ($c == chr(173) && $this->FontFamily!='csymbol' && $this->FontFamily!='czapfdingbats') { 
        return 0;
    }
    else if ($this->S && isset($this->upperCase[ord($c)])) { 
        $charw = $this->CurrentFont['cw'][chr($this->upperCase[ord($c)])];
        if ($charw!==false) { 
            $charw = $charw*$this->smCapsScale * $this->smCapsStretch/100;
            $w+=$charw; 
        }
    }
    else if (isset($this->CurrentFont['cw'][$c])) { 
        $w += $this->CurrentFont['cw'][$c]; 
    } 
    else if (isset($this->CurrentFont['cw'][ord($c)])) { 
        $w += $this->CurrentFont['cw'][ord($c)]; 
    }
    $w *=  ($this->FontSize/ 1000);
    if ($this->minwSpacing || $this->fixedlSpacing) {
        if ($c==' ') $nb_spaces = 1;
        else $nb_spaces = 0;
        $w += $this->fixedlSpacing + ($nb_spaces * $this->minwSpacing);
    }
    return ($w);
}

function GetCharWidthNonCore($c, $addSubset=true) {
    //Get width of a single character in the current Non-Core font
    $c = (string)$c;
    $w = 0;
    $unicode = $this->UTF8StringToArray($c, $addSubset);
    $char = $unicode[0];
/*-- CJK-FONTS --*/
    if ($this->CurrentFont['type'] == 'Type0') {    // CJK Adobe fonts
            if ($char == 173) { return 0; } // Soft Hyphens
            elseif (isset($this->CurrentFont['cw'][$char])) { $w+=$this->CurrentFont['cw'][$char]; } 
            elseif(isset($this->CurrentFont['MissingWidth'])) { $w += $this->CurrentFont['MissingWidth']; }
            else { $w += 500; }
    }
    else { 
/*-- END CJK-FONTS --*/
            if ($char == 173) { return 0; } // Soft Hyphens
            else if ($this->S && isset($this->upperCase[$char])) {
                $charw = $this->_getCharWidth($this->CurrentFont['cw'],$this->upperCase[$char]);
                if ($charw!==false) { 
                    $charw = $charw*$this->smCapsScale * $this->smCapsStretch/100;
                    $w+=$charw; 
                }
                elseif(isset($this->CurrentFont['desc']['MissingWidth'])) { $w += $this->CurrentFont['desc']['MissingWidth']; }
                elseif(isset($this->CurrentFont['MissingWidth'])) { $w += $this->CurrentFont['MissingWidth']; }
                else { $w += 500; }
            }
            else {
                $charw = $this->_getCharWidth($this->CurrentFont['cw'],$char);
                if ($charw!==false) { $w+=$charw; }
                elseif(isset($this->CurrentFont['desc']['MissingWidth'])) { $w += $this->CurrentFont['desc']['MissingWidth']; }
                elseif(isset($this->CurrentFont['MissingWidth'])) { $w += $this->CurrentFont['MissingWidth']; }
                else { $w += 500; }
            }
    }   // *CJK-FONTS*
    $w *=  ($this->FontSize/ 1000);
    if ($this->minwSpacing || $this->fixedlSpacing) {
        if ($c==' ') $nb_spaces = 1;
        else $nb_spaces = 0;
        $w += $this->fixedlSpacing + ($nb_spaces * $this->minwSpacing);
    }
    return ($w);
}


function GetCharWidth($c, $addSubset=true) {
    if (!$this->usingCoreFont) {
        return $this->GetCharWidthNonCore($c, $addSubset);
    } 
    else {
        return $this->GetCharWidthCore($c);
    }
}

function GetStringWidth($s, $addSubset=true) {
            //Get width of a string in the current font
            $s = (string)$s;
            $cw = &$this->CurrentFont['cw'];
            $w = 0;
            $kerning = 0;
            $lastchar = 0;
            $nb_carac = 0;
            $nb_spaces = 0;
            // mPDF ITERATION
            if ($this->iterationCounter) $s = preg_replace('/{iteration ([a-zA-Z0-9_]+)}/', '\\1', $s);

            if (!$this->usingCoreFont) {
                  $s = str_replace("\xc2\xad",'',$s ); 
                $unicode = $this->UTF8StringToArray($s, $addSubset);
                if ($this->minwSpacing || $this->fixedlSpacing) {
                    $nb_carac = count($unicode);  
                    $nb_spaces = mb_substr_count($s,' ', $this->mb_enc);  
                }
/*-- CJK-FONTS --*/
                if ($this->CurrentFont['type'] == 'Type0') {    // CJK Adobe fonts
                    foreach($unicode as $char) {
                        if (isset($cw[$char])) { $w+=$cw[$char]; } 
                        elseif(isset($this->CurrentFont['MissingWidth'])) { $w += $this->CurrentFont['MissingWidth']; }
                        else { $w += 500; }
                    }
                }
                else { 
/*-- END CJK-FONTS --*/
                    foreach($unicode as $char) {
                        if ($this->S && isset($this->upperCase[$char])) {
                            $charw = $this->_getCharWidth($cw,$this->upperCase[$char]);
                            if ($charw!==false) { 
                                $charw = $charw*$this->smCapsScale * $this->smCapsStretch/100;
                                $w+=$charw; 
                            }
                            elseif(isset($this->CurrentFont['desc']['MissingWidth'])) { $w += $this->CurrentFont['desc']['MissingWidth']; }
                            elseif(isset($this->CurrentFont['MissingWidth'])) { $w += $this->CurrentFont['MissingWidth']; }
                            else { $w += 500; }
                        }
                        else {
                            $charw = $this->_getCharWidth($cw,$char);
                            if ($charw!==false) { $w+=$charw; }
                            elseif(isset($this->CurrentFont['desc']['MissingWidth'])) { $w += $this->CurrentFont['desc']['MissingWidth']; }
                            elseif(isset($this->CurrentFont['MissingWidth'])) { $w += $this->CurrentFont['MissingWidth']; }
                            else { $w += 500; }
                            if ($this->kerning && $this->useKerning && $lastchar) {
                                if (isset($this->CurrentFont['kerninfo'][$lastchar][$char])) { 
                                    $kerning += $this->CurrentFont['kerninfo'][$lastchar][$char]; 
                                }
                            }
                            $lastchar = $char;
                        }
                    }
                }   // *CJK-FONTS*

            } 
            else {
                if ($this->FontFamily!='csymbol' && $this->FontFamily!='czapfdingbats') { 
                    $s = str_replace(chr(173),'',$s ); 
                }
                $nb_carac = $l = strlen($s);
                if ($this->minwSpacing || $this->fixedlSpacing) {
                    $nb_spaces = substr_count($s,' ');  
                }
                for($i=0; $i<$l; $i++) {
                    if ($this->S && isset($this->upperCase[ord($s[$i])])) { 
                        $charw = $cw[chr($this->upperCase[ord($s[$i])])];
                        if ($charw!==false) { 
                            $charw = $charw*$this->smCapsScale * $this->smCapsStretch/100;
                            $w+=$charw; 
                        }
                    }
                    else if (isset($cw[$s[$i]])) { 
                        $w += $cw[$s[$i]]; 
                    } 
                    else if (isset($cw[ord($s[$i])])) { 
                        $w += $cw[ord($s[$i])]; 
                    }
                    if ($this->kerning && $this->useKerning && $i>0) {
                        if (isset($this->CurrentFont['kerninfo'][$s[($i-1)]][$s[$i]])) { 
                            $kerning += $this->CurrentFont['kerninfo'][$s[($i-1)]][$s[$i]]; 
                        }
                    }
                }
            }
            unset($cw);
            if ($this->kerning && $this->useKerning) { $w += $kerning; }
            $w *=  ($this->FontSize/ 1000);
            $w += (($nb_carac + $nb_spaces) * $this->fixedlSpacing) + ($nb_spaces * $this->minwSpacing);
            return ($w);
}

function SetLineWidth($width) {
    //Set line width
    $this->LineWidth=$width;
    $lwout = (sprintf('%.3F w',$width*_MPDFK));
    if($this->page>0 && ((isset($this->pageoutput[$this->page]['LineWidth']) && $this->pageoutput[$this->page]['LineWidth'] != $lwout) || !isset($this->pageoutput[$this->page]['LineWidth']) || $this->keep_block_together)) {
         $this->_out($lwout); 
    }
    $this->pageoutput[$this->page]['LineWidth'] = $lwout;
}

function Line($x1,$y1,$x2,$y2) {
    //Draw a line
    $this->_out(sprintf('%.3F %.3F m %.3F %.3F l S',$x1*_MPDFK,($this->h-$y1)*_MPDFK,$x2*_MPDFK,($this->h-$y2)*_MPDFK));
}

function Arrow($x1,$y1,$x2,$y2,$headsize=3,$fill='B',$angle=25) {
  //F == fill //S == stroke //B == stroke and fill 
  // angle = splay of arrowhead - 1 - 89 degrees
  if($fill=='F')    $fill='f';
  elseif($fill=='FD' or $fill=='DF' or $fill=='B') $fill='B';
  else $fill='S';
  $a = atan2(($y2-$y1),($x2-$x1));
  $b = $a + deg2rad($angle);
  $c = $a - deg2rad($angle);
  $x3 = $x2 - ($headsize* cos($b));
  $y3 = $this->h-($y2 - ($headsize* sin($b)));
  $x4 = $x2 - ($headsize* cos($c));
  $y4 = $this->h-($y2 - ($headsize* sin($c)));

  $x5 = $x3-($x3-$x4)/2;    // mid point of base of arrowhead - to join arrow line to
  $y5 = $y3-($y3-$y4)/2;

  $s = '';
  $s.=sprintf('%.3F %.3F m %.3F %.3F l S',$x1*_MPDFK,($this->h-$y1)*_MPDFK,$x5*_MPDFK,$y5*_MPDFK);
  $this->_out($s);

  $s = '';
  $s.=sprintf('%.3F %.3F m %.3F %.3F l %.3F %.3F l %.3F %.3F l %.3F %.3F l ',$x5*_MPDFK,$y5*_MPDFK,$x3*_MPDFK,$y3*_MPDFK,$x2*_MPDFK,($this->h-$y2)*_MPDFK,$x4*_MPDFK,$y4*_MPDFK,$x5*_MPDFK,$y5*_MPDFK);
  $s.=$fill;
  $this->_out($s);
}


function Rect($x,$y,$w,$h,$style='') {
    //Draw a rectangle
    if($style=='F') $op='f';
    elseif($style=='FD' or $style=='DF') $op='B';
    else $op='S';
    $this->_out(sprintf('%.3F %.3F %.3F %.3F re %s',$x*_MPDFK,($this->h-$y)*_MPDFK,$w*_MPDFK,-$h*_MPDFK,$op));
}

function AddFont($family,$style='') {
    if(empty($family)) { return; }
    $family = strtolower($family);
    $style=strtoupper($style);
    $style=str_replace('U','',$style);
    if($style=='IB') $style='BI';
    $fontkey = $family.$style;
    // check if the font has been already added
    if(isset($this->fonts[$fontkey])) {
        return;
    }

/*-- CJK-FONTS --*/
    if (in_array($family,$this->available_CJK_fonts)) { 
        if (empty($this->Big5_widths)) { require(_MPDF_PATH . 'includes/CJKdata.php'); }
        $this->AddCJKFont($family); // don't need to add style
        return; 
    }
/*-- END CJK-FONTS --*/

    if ($this->usingCoreFont) { die("mPDF Error - problem with Font management"); }

    $stylekey = $style;
    if (!$style) { $stylekey = 'R'; }

    if (!isset($this->fontdata[$family][$stylekey]) || !$this->fontdata[$family][$stylekey]) {
        die('mPDF Error - Font is not supported - '.$family.' '.$style);
    }

    $name = '';
    $originalsize = 0;
    $sip = false;
    $smp = false;
    $unAGlyphs = false; // mPDF 5.4.05
    $haskerninfo = false;
    $BMPselected = false;
    @include(_MPDF_TTFONTDATAPATH.$fontkey.'.mtx.php');

    $ttffile = '';
    if (defined('_MPDF_SYSTEM_TTFONTS')) {
        $ttffile = _MPDF_SYSTEM_TTFONTS.$this->fontdata[$family][$stylekey];
        if (!file_exists($ttffile)) { $ttffile = ''; }
    }
    if (!$ttffile) {
        $ttffile = _MPDF_TTFONTPATH.$this->fontdata[$family][$stylekey];
        if (!file_exists($ttffile)) { die("mPDF Error - cannot find TTF TrueType font file - ".$ttffile); }
    }
    $ttfstat = stat($ttffile);

    if (isset($this->fontdata[$family]['TTCfontID'][$stylekey])) { $TTCfontID = $this->fontdata[$family]['TTCfontID'][$stylekey]; }
    else { $TTCfontID = 0; }


    $BMPonly = false;
    if (in_array($family,$this->BMPonly)) { $BMPonly = true; }
    $regenerate = false;
    if ($BMPonly && !$BMPselected) { $regenerate = true; }
    else if (!$BMPonly && $BMPselected) { $regenerate = true; }
    if ($this->useKerning && !$haskerninfo) { $regenerate = true; }
    // mPDF 5.4.05
    if (isset($this->fontdata[$family]['unAGlyphs']) && $this->fontdata[$family]['unAGlyphs'] && !$unAGlyphs) { 
        $regenerate = true; 
        $unAGlyphs = true;
    }
    else if ((!isset($this->fontdata[$family]['unAGlyphs']) || !$this->fontdata[$family]['unAGlyphs']) && $unAGlyphs) { 
        $regenerate = true; 
        $unAGlyphs = false;
    }
    if (!isset($name) || $originalsize != $ttfstat['size'] || $regenerate) {
        if (!class_exists('TTFontFile', false)) { include(_MPDF_PATH .'classes/ttfontsuni.php'); }
        $ttf = new TTFontFile();
        $ttf->getMetrics($ttffile, $TTCfontID, $this->debugfonts, $BMPonly, $this->useKerning, $unAGlyphs); // mPDF 5.4.05
        $cw = $ttf->charWidths;
        $kerninfo = $ttf->kerninfo;
        $haskerninfo = true;
        $name = preg_replace('/[ ()]/','',$ttf->fullName);
        $sip = $ttf->sipset;
        $smp = $ttf->smpset;

        $desc= array('Ascent'=>round($ttf->ascent),
        'Descent'=>round($ttf->descent),
        'CapHeight'=>round($ttf->capHeight),
        'Flags'=>$ttf->flags,
        'FontBBox'=>'['.round($ttf->bbox[0])." ".round($ttf->bbox[1])." ".round($ttf->bbox[2])." ".round($ttf->bbox[3]).']',
        'ItalicAngle'=>$ttf->italicAngle,
        'StemV'=>round($ttf->stemV),
        'MissingWidth'=>round($ttf->defaultWidth));
        $panose = '';
        // mPDF 5.5.19
        if (count($ttf->panose)) {
            $panoseArray = array_merge(array($ttf->sFamilyClass, $ttf->sFamilySubClass), $ttf->panose);
            foreach($panoseArray as $value)
                $panose .= ' '.dechex($value);
        }
        $up = round($ttf->underlinePosition);
        $ut = round($ttf->underlineThickness);
        $originalsize = $ttfstat['size']+0;
        $type = 'TTF';
        //Generate metrics .php file
        $s='<?php'."\n";
        $s.='$name=\''.$name."';\n";
        $s.='$type=\''.$type."';\n";
        $s.='$desc='.var_export($desc,true).";\n";
        $s.='$up='.$up.";\n";
        $s.='$ut='.$ut.";\n";
        $s.='$ttffile=\''.$ttffile."';\n";
        $s.='$TTCfontID=\''.$TTCfontID."';\n";
        $s.='$originalsize='.$originalsize.";\n";
        if ($sip) $s.='$sip=true;'."\n";
        else $s.='$sip=false;'."\n";
        if ($smp) $s.='$smp=true;'."\n";
        else $s.='$smp=false;'."\n";
        if ($BMPonly) $s.='$BMPselected=true;'."\n";
        else $s.='$BMPselected=false;'."\n";
        $s.='$fontkey=\''.$fontkey."';\n";
        $s.='$panose=\''.$panose."';\n";
        if ($this->useKerning) { 
            $s.='$kerninfo='.var_export($kerninfo,true).";\n"; 
            $s.='$haskerninfo=true;'."\n";
        }
        else $s.='$haskerninfo=false;'."\n";
        // mPDF 5.4.05
        if ($this->fontdata[$family]['unAGlyphs']) { 
            $s.='$unAGlyphs=true;'."\n";
        }
        else $s.='$unAGlyphs=false;'."\n";
        $s.="?>";
        if (is_writable(dirname(_MPDF_TTFONTDATAPATH.'x'))) {
            $fh = fopen(_MPDF_TTFONTDATAPATH.$fontkey.'.mtx.php',"w");
            fwrite($fh,$s,strlen($s));
            fclose($fh);
            $fh = fopen(_MPDF_TTFONTDATAPATH.$fontkey.'.cw.dat',"wb");
            fwrite($fh,$cw,strlen($cw));
            fclose($fh);
            @unlink(_MPDF_TTFONTDATAPATH.$fontkey.'.cgm');
            @unlink(_MPDF_TTFONTDATAPATH.$fontkey.'.z');
            @unlink(_MPDF_TTFONTDATAPATH.$fontkey.'.cw127.php');
            @unlink(_MPDF_TTFONTDATAPATH.$fontkey.'.cw');
        }
        else if ($this->debugfonts) { $this->Error('Cannot write to the font caching directory - '._MPDF_TTFONTDATAPATH); }
        unset($ttf);
    }
    else {
        $cw = @file_get_contents(_MPDF_TTFONTDATAPATH.$fontkey.'.cw.dat'); 
    }

    if (isset($this->fontdata[$family]['indic']) && $this->fontdata[$family]['indic']) { $indic = true; }
    else { $indic = false; }
    if (isset($this->fontdata[$family]['sip-ext']) && $this->fontdata[$family]['sip-ext']) { $sipext = $this->fontdata[$family]['sip-ext']; }
    else { $sipext = ''; }


    $i = count($this->fonts)+$this->extraFontSubsets+1;
    if ($sip || $smp) {
        $this->fonts[$fontkey] = array('i'=>$i, 'type'=>$type, 'name'=>$name, 'desc'=>$desc, 'panose'=>$panose, 'up'=>$up, 'ut'=>$ut, 'cw'=>$cw, 'ttffile'=>$ttffile, 'fontkey'=>$fontkey, 'subsets'=>array(0=>range(0,127)), 'subsetfontids'=>array($i), 'used'=>false, 'indic'=>$indic, 'sip'=>$sip, 'sipext'=>$sipext, 'smp'=>$smp, 'TTCfontID' => $TTCfontID, 'unAGlyphs' => false);    // mPDF 5.4.05
    }
    else  {
        $ss = array();
        for ($s=32; $s<128; $s++) { $ss[$s] = $s; }
        $this->fonts[$fontkey] = array('i'=>$i, 'type'=>$type, 'name'=>$name, 'desc'=>$desc, 'panose'=>$panose, 'up'=>$up, 'ut'=>$ut, 'cw'=>$cw, 'ttffile'=>$ttffile, 'fontkey'=>$fontkey, 'subset'=>$ss, 'used'=>false, 'indic'=>$indic, 'sip'=>$sip, 'sipext'=>$sipext, 'smp'=>$smp, 'TTCfontID' => $TTCfontID, 'unAGlyphs' => $unAGlyphs);   // mPDF 5.4.05
    }
    if ($this->useKerning && $haskerninfo) { $this->fonts[$fontkey]['kerninfo'] = $kerninfo; }
    $this->FontFiles[$fontkey]=array('length1'=>$originalsize, 'type'=>"TTF", 'ttffile'=>$ttffile, 'sip'=>$sip, 'smp'=>$smp);
    unset($cw);
}



function SetFont($family,$style='',$size=0, $write=true, $forcewrite=false) {
    $family=strtolower($family);
    if (!$this->onlyCoreFonts) {
        if ($family == 'sans' || $family == 'sans-serif') { $family = $this->sans_fonts[0]; }
        if ($family == 'serif') { $family = $this->serif_fonts[0]; }
        if ($family == 'mono' || $family == 'monospace') { $family = $this->mono_fonts[0]; }
    }
    if (isset($this->fonttrans[$family]) && $this->fonttrans[$family]) { $family = $this->fonttrans[$family]; }
    if($family=='') { 
        if ($this->FontFamily) { $family=$this->FontFamily; }
        else if ($this->default_font) { $family=$this->default_font; }
        else { $this->Error("No font or default font set!"); }
    }
    $this->ReqFontStyle = $style;   // required or requested style - used later for artificial bold/italic

    if (($family == 'csymbol') || ($family == 'czapfdingbats')  || ($family == 'ctimes')  || ($family == 'ccourier') || ($family == 'chelvetica')) { 
        if ($this->PDFA || $this->PDFX) {
           if ($family == 'csymbol' || $family == 'czapfdingbats') { 
            $this->Error("Symbol and Zapfdingbats cannot be embedded in mPDF (required for PDFA1-b or PDFX/1-a).");
           }
           if ($family == 'ctimes'  || $family == 'ccourier' || $family == 'chelvetica') { 
            if (($this->PDFA && !$this->PDFAauto) || ($this->PDFX && !$this->PDFXauto)) { $this->PDFAXwarnings[] = "Core Adobe font ".ucfirst($family)." cannot be embedded in mPDF, which is required for PDFA1-b or PDFX/1-a. (Embedded font will be substituted.)"; }
            if ($family == 'chelvetica') { $family = 'sans'; }
            if ($family == 'ctimes') { $family = 'serif'; }
            if ($family == 'ccourier') { $family = 'mono'; }
           }
           $this->usingCoreFont = false;
        }
        else { $this->usingCoreFont = true; }
        if($family=='csymbol' || $family=='czapfdingbats') { $style=''; }
    }
    else {  $this->usingCoreFont = false; }

    $this->U=false;
    $this->S=false;
    if ($style) {
        $style=strtoupper($style);
        if(strpos($style,'U')!==false) {
            $this->U=true;
            $style=str_replace('U','',$style);
        }
        if(strpos($style,'S')!==false) {
            $this->S=true;
            // Small Caps
            if (empty($this->upperCase)) { @include(_MPDF_PATH.'includes/upperCase.php'); } 
            $style=str_replace('S','',$style);
        }
        if ($style=='IB') $style='BI';
    }
    if ($size==0) $size=$this->FontSizePt;

    $fontkey=$family.$style;

    $stylekey = $style;
    if (!$stylekey) { $stylekey = "R"; }

    if (!$this->onlyCoreFonts && !$this->usingCoreFont) {
        if(!isset($this->fonts[$fontkey]) || count($this->default_available_fonts) != count($this->available_unifonts) ) { // not already added
/*-- CJK-FONTS --*/
          // CJK fonts
          if (in_array($fontkey,$this->available_CJK_fonts)) {
            if(!isset($this->fonts[$fontkey])) {    // already added
                if (empty($this->Big5_widths)) { require(_MPDF_PATH . 'includes/CJKdata.php'); }
                $this->AddCJKFont($family); // don't need to add style
            }
          }
          // Test to see if requested font/style is available - or substitute
          else
/*-- END CJK-FONTS --*/
          if (!in_array($fontkey,$this->available_unifonts)) {
            // If font[nostyle] exists - set it
            if (in_array($family,$this->available_unifonts)) {
                $style = '';
            }

            // Else if only one font available - set it (assumes if only one font available it will not have a style)
            else if (count($this->available_unifonts) == 1) {
                $family = $this->available_unifonts[0];
                $style = '';
            }

            else {
                $found = 0;
                // else substitute font of similar type
                if (in_array($family,$this->sans_fonts)) { 
                    $i = array_intersect($this->sans_fonts,$this->available_unifonts);
                    if (count($i)) {
                        $i = array_values($i);
                        // with requested style if possible
                        if (!in_array(($i[0].$style),$this->available_unifonts)) {
                            $style = '';
                        }
                        $family = $i[0]; 
                        $found = 1;
                    }
                }
                else if (in_array($family,$this->serif_fonts)) { 
                    $i = array_intersect($this->serif_fonts,$this->available_unifonts);
                    if (count($i)) {
                        $i = array_values($i);
                        // with requested style if possible
                        if (!in_array(($i[0].$style),$this->available_unifonts)) {
                            $style = '';
                        }
                        $family = $i[0]; 
                        $found = 1;
                    }
                }
                else if (in_array($family,$this->mono_fonts)) {
                    $i = array_intersect($this->mono_fonts,$this->available_unifonts);
                    if (count($i)) {
                        $i = array_values($i);
                        // with requested style if possible
                        if (!in_array(($i[0].$style),$this->available_unifonts)) {
                            $style = '';
                        }
                        $family = $i[0]; 
                        $found = 1;
                    }
                }

                if (!$found) {
                    // set first available font
                    $fs = $this->available_unifonts[0];
                    preg_match('/^([a-z_0-9\-]+)([BI]{0,2})$/',$fs,$fas);   // Allow "-"
                    // with requested style if possible
                    $ws = $fas[1].$style;
                    if (in_array($ws,$this->available_unifonts)) {
                        $family = $fas[1]; // leave $style as is
                    }
                    else if (in_array($fas[1],$this->available_unifonts)) {
                    // or without style
                        $family = $fas[1];
                        $style = '';
                    }
                    else {
                    // or with the style specified 
                        $family = $fas[1];
                        $style = $fas[2];
                    }
                }
            }
            $fontkey = $family.$style; 
          }
        }
        // try to add font (if not already added)
        $this->AddFont($family, $style);

        //Test if font is already selected
        if($this->FontFamily == $family && $this->FontFamily == $this->currentfontfamily && $this->FontStyle == $style && $this->FontStyle == $this->currentfontstyle && $this->FontSizePt == $size && $this->FontSizePt == $this->currentfontsize && !$forcewrite) {
            return $family;
        }

        $fontkey = $family.$style; 

        //Select it
        $this->FontFamily = $family;
        $this->FontStyle = $style;
        $this->FontSizePt = $size;
        $this->FontSize = $size / _MPDFK;
        $this->CurrentFont = &$this->fonts[$fontkey];
        if ($write) { 
            $fontout = (sprintf('BT /F%d %.3F Tf ET', $this->CurrentFont['i'], $this->FontSizePt));
            if($this->page>0 && ((isset($this->pageoutput[$this->page]['Font']) && $this->pageoutput[$this->page]['Font'] != $fontout) || !isset($this->pageoutput[$this->page]['Font']) || $this->keep_block_together)) { $this->_out($fontout); }
            $this->pageoutput[$this->page]['Font'] = $fontout;
        }



        // Added - currentfont (lowercase) used in HTML2PDF
        $this->currentfontfamily=$family;
        $this->currentfontsize=$size;
        $this->currentfontstyle=$style.($this->U ? 'U' : '').($this->S ? 'S' : '');
        $this->setMBencoding('UTF-8');
    }

    else {  // if using core fonts


        if ($this->PDFA || $this->PDFX) {
            $this->Error('Core Adobe fonts cannot be embedded in mPDF (required for PDFA1-b or PDFX/1-a) - cannot use option to use core fonts.');
        }
        $this->setMBencoding('windows-1252');

        //Test if font is already selected
        if(($this->FontFamily == $family) AND ($this->FontStyle == $style) AND ($this->FontSizePt == $size) && !$forcewrite) {
            return $family;
        }

        if (!isset($this->CoreFonts[$fontkey])) {
            if (in_array($family,$this->serif_fonts)) { $family = 'ctimes'; }
            else if (in_array($family,$this->mono_fonts)) { $family = 'ccourier'; }
            else { $family = 'chelvetica'; }
            $this->usingCoreFont = true;
            $fontkey = $family.$style; 
        }

        if(!isset($this->fonts[$fontkey]))  {
            // STANDARD CORE FONTS
            if (isset($this->CoreFonts[$fontkey])) {
                //Load metric file
                $file=$family;
                if($family=='ctimes' || $family=='chelvetica' || $family=='ccourier') { $file.=strtolower($style); }
                $file.='.php';
                include(_MPDF_PATH.'font/'.$file);
                if(!isset($cw)) { $this->Error('Could not include font metric file'); }
                $i=count($this->fonts)+$this->extraFontSubsets+1;
                $this->fonts[$fontkey]=array('i'=>$i,'type'=>'core','name'=>$this->CoreFonts[$fontkey],'desc'=>$desc,'up'=>$up,'ut'=>$ut,'cw'=>$cw);
                if ($this->useKerning) { $this->fonts[$fontkey]['kerninfo'] = $kerninfo; }
            }
            else {
                die('mPDF error - Font not defined');
            }
        }
        //Test if font is already selected
        if(($this->FontFamily == $family) AND ($this->FontStyle == $style) AND ($this->FontSizePt == $size) && !$forcewrite) {
            return $family;
        }
        //Select it
        $this->FontFamily=$family;
        $this->FontStyle=$style;
        $this->FontSizePt=$size;
        $this->FontSize=$size/_MPDFK;
        $this->CurrentFont=&$this->fonts[$fontkey];
        if ($write) { 
            $fontout = (sprintf('BT /F%d %.3F Tf ET', $this->CurrentFont['i'], $this->FontSizePt));
            if($this->page>0 && ((isset($this->pageoutput[$this->page]['Font']) && $this->pageoutput[$this->page]['Font'] != $fontout) || !isset($this->pageoutput[$this->page]['Font']) || $this->keep_block_together)) { $this->_out($fontout); }
            $this->pageoutput[$this->page]['Font'] = $fontout;
        }
        // Added - currentfont (lowercase) used in HTML2PDF
        $this->currentfontfamily=$family;
        $this->currentfontsize=$size;
        $this->currentfontstyle=$style.($this->U ? 'U' : '').($this->S ? 'S' : '');

    }

    return $family;
}

function SetFontSize($size,$write=true) {
    //Set font size in points
    if($this->FontSizePt==$size) return;
    $this->FontSizePt=$size;
    $this->FontSize=$size/_MPDFK;
    $this->currentfontsize=$size;
        if ($write) { 
            $fontout = (sprintf('BT /F%d %.3F Tf ET', $this->CurrentFont['i'], $this->FontSizePt));
            // Edited mPDF 3.0
            if($this->page>0 && ((isset($this->pageoutput[$this->page]['Font']) && $this->pageoutput[$this->page]['Font'] != $fontout) || !isset($this->pageoutput[$this->page]['Font']) || $this->keep_block_together)) { $this->_out($fontout); }
            $this->pageoutput[$this->page]['Font'] = $fontout;
        }
}

function AddLink() {
    //Create a new internal link
    $n=count($this->links)+1;
    $this->links[$n]=array(0,0);
    return $n;
}

function SetLink($link,$y=0,$page=-1) {
    //Set destination of internal link
    if($y==-1) $y=$this->y;
    if($page==-1)   $page=$this->page;
    $this->links[$link]=array($page,$y);
}

function Link($x,$y,$w,$h,$link) {
    $l = array($x*_MPDFK,$this->hPt-$y*_MPDFK,$w*_MPDFK,$h*_MPDFK,$link);
    if ($this->keep_block_together) {   // Save to array - don't write yet
        $this->ktLinks[$this->page][]= $l;
        return;
    }
    else if ($this->table_rotate) { // *TABLES*
        $this->tbrot_Links[$this->page][]= $l;  // *TABLES*
        return; // *TABLES*
    }   // *TABLES*
    else if ($this->kwt) {
        $this->kwt_Links[$this->page][]= $l;
        return;
    }

    if ($this->writingHTMLheader || $this->writingHTMLfooter) {
        $this->HTMLheaderPageLinks[]= $l;
        return;
    }
    //Put a link on the page
    $this->PageLinks[$this->page][]= $l;
    // Save cross-reference to Column buffer
    $ref = count($this->PageLinks[$this->page])-1;  // *COLUMNS*
    $this->columnLinks[$this->CurrCol][INTVAL($this->x)][INTVAL($this->y)] = $ref;  // *COLUMNS*

}

function Text($x,$y,$txt) {
    // Output a string
    // Called (internally) by Watermark and _tableWrite [rotated cells]
    // Expects input to be mb_encoded if necessary and RTL reversed

    // ARTIFICIAL BOLD AND ITALIC
    $s = 'q ';
    if ($this->falseBoldWeight && strpos($this->ReqFontStyle,"B") !== false && strpos($this->FontStyle,"B") === false) {
        $s  .= '2 Tr 1 J 1 j ';
        $s .= sprintf('%.3F w ',($this->FontSize/130)*_MPDFK*$this->falseBoldWeight);
        $tc = strtoupper($this->TextColor); // change 0 0 0 rg to 0 0 0 RG
        if($this->FillColor!=$tc) { $s .= $tc.' '; }        // stroke (outline) = same colour as text(fill)
    }
    if (strpos($this->ReqFontStyle,"I") !== false && strpos($this->FontStyle,"I") === false) {
        $aix = '1 0 0.261799 1 %.3F %.3F Tm'; 
    }
    else { $aix = '%.3F %.3F Td'; }

    if($this->ColorFlag) $s.=$this->TextColor.' ';

    $this->CurrentFont['used']= true;
    if ($this->CurrentFont['type']=='TTF' && ($this->CurrentFont['sip'] || $this->CurrentFont['smp'])) {
          $txt2 = str_replace(chr(194).chr(160),chr(32),$txt);
        $txt2 = $this->UTF8toSubset($txt2);
        $s.=sprintf('BT '.$aix.' %s Tj ET ',$x*_MPDFK,($this->h-$y)*_MPDFK,$txt2);
    }
    else if (!$this->usingCoreFont) {
          $txt2 = str_replace(chr(194).chr(160),chr(32),$txt); 
        $this->UTF8StringToArray($txt2);    // this is just to add chars to subset list
        if ($this->kerning && $this->useKerning) { $s .= $this->_kern($txt2, '', $aix, $x, $y); }
        else {
            //Convert string to UTF-16BE without BOM
            $txt2= $this->UTF8ToUTF16BE($txt2, false);
            $s.=sprintf('BT '.$aix.' (%s) Tj ET ',$x*_MPDFK,($this->h-$y)*_MPDFK,$this->_escape($txt2));
        }
    }
    else {
          $txt2 = str_replace(chr(160),chr(32),$txt);
        if ($this->kerning && $this->useKerning) { $s .= $this->_kern($txt2, '', $aix, $x, $y); }
        else {
            $s.=sprintf('BT '.$aix.' (%s) Tj ET ',$x*_MPDFK,($this->h-$y)*_MPDFK,$this->_escape($txt2));
        }
    }
    if($this->U && $txt!='') {
        $c = strtoupper($this->TextColor); // change 0 0 0 rg to 0 0 0 RG
        if($this->FillColor!=$c) { $s.= ' '.$c.' '; }
        if (isset($this->CurrentFont['up'])) { $up=$this->CurrentFont['up']; }
        else { $up = -100; }
        $adjusty = (-$up/1000* $this->FontSize);
        if (isset($this->CurrentFont['ut'])) { $ut=$this->CurrentFont['ut']/1000* $this->FontSize; }
        else { $ut = 60/1000* $this->FontSize; }
        $olw = $this->LineWidth;
        $s.=' '.(sprintf(' %.3F w',$ut*_MPDFK));
        $s.=' '.$this->_dounderline($x,$y + $adjusty,$txt);
        $s.=' '.(sprintf(' %.3F w',$olw*_MPDFK));
        if($this->FillColor!=$c) { $s.= ' '.$this->FillColor.' '; }
    }
    // STRIKETHROUGH
    if($this->strike && $txt!='') {
        $c = strtoupper($this->TextColor); // change 0 0 0 rg to 0 0 0 RG
        if($this->FillColor!=$c) { $s.= ' '.$c.' '; }
            //Superscript and Subscript Y coordinate adjustment (now for striked-through texts)
        if (isset($this->CurrentFont['desc']['CapHeight'])) { $ch=$this->CurrentFont['desc']['CapHeight']; }
        else { $ch = 700; }
        $adjusty = (-$ch/1000* $this->FontSize) * 0.35;
        if (isset($this->CurrentFont['ut'])) { $ut=$this->CurrentFont['ut']/1000* $this->FontSize; }
        else { $ut = 60/1000* $this->FontSize; }
        $olw = $this->LineWidth;
        $s.=' '.(sprintf(' %.3F w',$ut*_MPDFK));
        $s.=' '.$this->_dounderline($x,$y+$adjusty,$txt);
        $s.=' '.(sprintf(' %.3F w',$olw*_MPDFK));
        if($this->FillColor!=$c) { $s.= ' '.$this->FillColor.' '; }
    }
    $s .= 'Q';
    $this->_out($s);
}

/*-- DIRECTW --*/
function WriteText($x,$y,$txt) {
    // Output a string using Text() but does encoding and text reversing of RTL
    $txt = $this->purify_utf8_text($txt);
    if ($this->text_input_as_HTML) {
        $txt = $this->all_entities_to_utf8($txt);
    }
    if ($this->usingCoreFont) { $txt = mb_convert_encoding($txt,$this->mb_enc,'UTF-8'); }
    // DIRECTIONALITY
    if (preg_match("/([".$this->pregRTLchars."])/u", $txt)) { $this->biDirectional = true; }    // *RTL*
    $this->magic_reverse_dir($txt, true, $this->directionality);    // *RTL*
    // Font-specific ligature substitution for Indic fonts
    if (isset($this->CurrentFont['indic']) && $this->CurrentFont['indic']) $this->ConvertIndic($txt);   // *INDIC*
    $this->Text($x,$y,$txt);
}

function WriteCell($w,$h=0,$txt='',$border=0,$ln=0,$align='',$fill=0,$link='', $currentx=0) {
    //Output a cell using Cell() but does encoding and text reversing of RTL
    $txt = $this->purify_utf8_text($txt);
    if ($this->text_input_as_HTML) {
        $txt = $this->all_entities_to_utf8($txt);
    }
    if ($this->usingCoreFont) { $txt = mb_convert_encoding($txt,$this->mb_enc,'UTF-8'); }
    // DIRECTIONALITY
    if (preg_match("/([".$this->pregRTLchars."])/u", $txt)) { $this->biDirectional = true; }    // *RTL*
    $this->magic_reverse_dir($txt, true, $this->directionality);    // *RTL*
    // Font-specific ligature substitution for Indic fonts
    if (isset($this->CurrentFont['indic']) && $this->CurrentFont['indic']) $this->ConvertIndic($txt);   // *INDIC*
    $this->Cell($w,$h,$txt,$border,$ln,$align,$fill,$link, $currentx);
}
/*-- END DIRECTW --*/


function ResetSpacing() {
    if ($this->ws != 0) { $this->_out('BT 0 Tw ET'); }
    $this->ws=0;
    if ($this->charspacing != 0) { $this->_out('BT 0 Tc ET'); }
    $this->charspacing=0;
}


function SetSpacing($cs,$ws) {
    if (intval($cs*1000)==0) { $cs = 0; }
    if ($cs) { $this->_out(sprintf('BT %.3F Tc ET',$cs)); }
    else if ($this->charspacing != 0) { $this->_out('BT 0 Tc ET'); }
    $this->charspacing=$cs;
    if (intval($ws*1000)==0) { $ws = 0; }
    if ($ws) { $this->_out(sprintf('BT %.3F Tw ET',$ws)); }
    else if ($this->ws != 0) { $this->_out('BT 0 Tw ET'); }
    $this->ws=$ws;
}

// WORD SPACING
function GetJspacing($nc,$ns,$w,$inclCursive) {
    $ws = 0; 
    $charspacing = 0;
    $ww = $this->jSWord;
    $ncx = $nc-1;
    if ($nc == 0) { return array(0,0); }
    else if ($nc==1) { $charspacing = $w; }
    // Only word spacing allowed / possible
    else if ($this->fixedlSpacing !== false || $inclCursive) {
        if ($ns) { $ws = $w / $ns; } 
    }
    else if (!$ns) {
        $charspacing = $w / ($ncx );
        if (($this->jSmaxChar > 0) && ($charspacing > $this->jSmaxChar)) { 
            $charspacing = $this->jSmaxChar;
        }
    }
    else if ($ns == ($ncx )) {
        $charspacing = $w / $ns;
    }
    else {
        if ($this->usingCoreFont) {
            $cs = ($w * (1 - $this->jSWord)) / ($ncx );
            if (($this->jSmaxChar > 0) && ($cs > $this->jSmaxChar)) {
                $cs = $this->jSmaxChar;
                $ww = 1 - (($cs * ($ncx ))/$w);
            }
            $charspacing = $cs; 
            $ws = ($w * ($ww) ) / $ns;
        }
        else {
            $cs = ($w * (1 - $this->jSWord)) / ($ncx -$ns);
            if (($this->jSmaxChar > 0) && ($cs > $this->jSmaxChar)) {
                $cs = $this->jSmaxChar;
                $ww = 1 - (($cs * ($ncx -$ns))/$w);
            }
            $charspacing = $cs; 
            $ws = (($w * ($ww) ) / $ns) - $charspacing;
        }
    }
    return array($charspacing,$ws); 
}

function Cell($w,$h=0,$txt='',$border=0,$ln=0,$align='',$fill=0,$link='', $currentx=0, $lcpaddingL=0, $lcpaddingR=0, $valign='M', $spanfill=0, $abovefont=0, $belowfont=0, $exactWidth=false) {
    //Output a cell
    // Expects input to be mb_encoded if necessary and RTL reversed
    // NON_BREAKING SPACE
    if ($this->usingCoreFont) {
          $txt = str_replace(chr(160),chr(32),$txt);
    }
    else {
          $txt = str_replace(chr(194).chr(160),chr(32),$txt);
    }

    $oldcolumn = $this->CurrCol;
    // Automatic page break
    // Allows PAGE-BREAK-AFTER = avoid to work

    if (!$this->tableLevel && (($this->y+$this->divheight>$this->PageBreakTrigger) || ($this->y+$h>$this->PageBreakTrigger) || 
        ($this->y+($h*2)>$this->PageBreakTrigger && $this->blk[$this->blklvl]['page_break_after_avoid'])) and !$this->InFooter and $this->AcceptPageBreak()) {
        $x=$this->x;//Current X position


        // WORD SPACING
        $ws=$this->ws;//Word Spacing
        $charspacing=$this->charspacing;//Character Spacing
        $this->ResetSpacing();

        $this->AddPage($this->CurOrientation);
        // Added to correct for OddEven Margins
        $x += $this->MarginCorrection;
        if ($currentx) { 
            $currentx += $this->MarginCorrection;
        } 
        $this->x=$x;
        // WORD SPACING
        $this->SetSpacing($charspacing,$ws);
    }

    // Test: to put line through centre of cell: $this->Line($this->x,$this->y+($h/2),$this->x+50,$this->y+($h/2));

/*-- COLUMNS --*/
    // COLS
    // COLUMN CHANGE
    if ($this->CurrCol != $oldcolumn) {
        if ($currentx) { 
            $currentx += $this->ChangeColumn * ($this->ColWidth+$this->ColGap);
        } 
        $this->x += $this->ChangeColumn * ($this->ColWidth+$this->ColGap);
    }

    // COLUMNS Update/overwrite the lowest bottom of printing y value for a column
    if ($this->ColActive) {
        if ($h) { $this->ColDetails[$this->CurrCol]['bottom_margin'] = $this->y+$h; }
        else { $this->ColDetails[$this->CurrCol]['bottom_margin'] = $this->y+$this->divheight; }
    }
/*-- END COLUMNS --*/

    // KEEP BLOCK TOGETHER Update/overwrite the lowest bottom of printing y value on first page
    if ($this->keep_block_together) {
        if ($h) { $this->ktBlock[$this->page]['bottom_margin'] = $this->y+$h; }
//      else { $this->ktBlock[$this->page]['bottom_margin'] = $this->y+$this->divheight; }
    }

    if($w==0) $w = $this->w-$this->rMargin-$this->x;
    $s='';
    if($fill==1 && $this->FillColor) { 
        if((isset($this->pageoutput[$this->page]['FillColor']) && $this->pageoutput[$this->page]['FillColor'] != $this->FillColor) || !isset($this->pageoutput[$this->page]['FillColor']) || $this->keep_block_together) { $s .= $this->FillColor.' '; }
        $this->pageoutput[$this->page]['FillColor'] = $this->FillColor;
    }


    $boxtop = $this->y;
    $boxheight = $h;
    $boxbottom = $this->y+$h;

    if($txt!='') {
        // FONT SIZE - this determines the baseline caculation
        if ($this->linemaxfontsize && !$this->processingHeader) { $bfs = $this->linemaxfontsize; }
        else  { $bfs = $this->FontSize; }
            //Calculate baseline Superscript and Subscript Y coordinate adjustment
        $bfx = $this->baselineC;
            $baseline = $bfx*$bfs;
        if($this->SUP) { $baseline += ($bfx-1.05)*$this->FontSize; }
        else if($this->SUB) { $baseline += ($bfx + 0.04)*$this->FontSize; }
        else if($this->bullet) { $baseline += ($bfx-0.7)*$this->FontSize; }

        // Vertical align (for Images)
        if ($abovefont || $belowfont) { // from flowing block - valign always M
            $va = $abovefont + (0.5*$bfs);
        }
        else if ($this->lineheight_correction) { 
            if ($valign == 'T') { $va = (0.5 * $bfs * $this->lineheight_correction); }
            else if ($valign == 'B') { $va = $h-(0.5 * $bfs * $this->lineheight_correction); }
            else { $va = 0.5*$h; }  // Middle
        }
        else { 
            if ($valign == 'T') { $va = (0.5 * $bfs * $this->default_lineheight_correction); }
            else if ($valign == 'B') { $va = $h-(0.5 * $bfs * $this->default_lineheight_correction); }
            else { $va = 0.5*$h; }  // Middle
        }

        // ONLY SET THESE IF WANT TO CONFINE BORDER +/- FILL TO FIT FONTSIZE - NOT FULL CELL AS IS ORIGINAL FUNCTION
        // spanfill or spanborder are set in FlowingBlock functions
        if ($spanfill || !empty($this->spanborddet) || $link!='') {
            $exth = 0.2;    // Add to fontsize to increase height of background / link / border
            $boxtop = $this->y+$baseline+$va-($this->FontSize*(1+$exth/2)*(0.5+$bfx));
            $boxheight = $this->FontSize * (1+$exth);
            $boxbottom = $boxtop + $boxheight;
        }
    }

    $bbw = $tbw = $lbw = $rbw = 0;  // Border widths
    if (!empty($this->spanborddet)) { 
        if (!isset($this->spanborddet['B'])) { $this->spanborddet['B'] = array('s' => 0, 'style' => '', 'w' => 0); }
        if (!isset($this->spanborddet['T'])) { $this->spanborddet['T'] = array('s' => 0, 'style' => '', 'w' => 0); }
        if (!isset($this->spanborddet['L'])) { $this->spanborddet['L'] = array('s' => 0, 'style' => '', 'w' => 0); }
        if (!isset($this->spanborddet['R'])) { $this->spanborddet['R'] = array('s' => 0, 'style' => '', 'w' => 0); }
        $bbw = $this->spanborddet['B']['w'];
        $tbw = $this->spanborddet['T']['w'];
        $lbw = $this->spanborddet['L']['w'];
        $rbw = $this->spanborddet['R']['w'];
    }
    if($fill==1 || $border==1 || !empty($this->spanborddet)) {
        if (!empty($this->spanborddet)) { 
            if ($fill==1) {
                $s.=sprintf('%.3F %.3F %.3F %.3F re f ',($this->x-$lbw)*_MPDFK,($this->h-$boxtop+$tbw)*_MPDFK,($w+$lbw+$rbw)*_MPDFK,(-$boxheight-$tbw-$bbw)*_MPDFK);
            }
            $s.= ' q ';
            $dashon = 3;
            $dashoff = 3.5;
            $dot = 2.5;
            if($tbw) {
                $short = 0;
                if ($this->spanborddet['T']['style'] == 'dashed') {
                    $s.=sprintf(' 0 j 0 J [%.3F %.3F] 0 d ',$tbw*$dashon*_MPDFK,$tbw*$dashoff*_MPDFK);
                }
                else if ($this->spanborddet['T']['style'] == 'dotted') {
                    $s.=sprintf(' 1 j 1 J [%.3F %.3F] %.3F d ',0.001,$tbw*$dot*_MPDFK,-$tbw/2*_MPDFK);
                    $short = $tbw/2;
                }
                else {
                    $s.=' 0 j 0 J [] 0 d ';
                }
                $c = $this->SetDColor($this->spanborddet['T']['c'],true);
                if ($this->spanborddet['T']['style'] == 'double') {
                    $s.=sprintf(' %s %.3F w ',$c,$tbw/3*_MPDFK);
                    $xadj = $xadj2 = 0; 
                    if ($this->spanborddet['L']['style'] == 'double') { $xadj = $this->spanborddet['L']['w']*2/3; }
                    if ($this->spanborddet['R']['style'] == 'double') { $xadj2 = $this->spanborddet['R']['w']*2/3; }
                    $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($this->x-$lbw)*_MPDFK,($this->h-$boxtop+$tbw*5/6)*_MPDFK,($this->x+$w+$rbw-$short)*_MPDFK,($this->h-$boxtop+$tbw*5/6)*_MPDFK);
                    $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($this->x-$lbw+$xadj)*_MPDFK,($this->h-$boxtop+$tbw/6)*_MPDFK,($this->x+$w+$rbw-$short-$xadj2)*_MPDFK,($this->h-$boxtop+$tbw/6)*_MPDFK);
                }
                else {
                    $s.=sprintf(' %s %.3F w ',$c,$tbw*_MPDFK);
                    $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($this->x-$lbw)*_MPDFK,($this->h-$boxtop+$tbw/2)*_MPDFK,($this->x+$w+$rbw-$short)*_MPDFK,($this->h-$boxtop+$tbw/2)*_MPDFK);
                }
            }
            if($bbw) {
                $short = 0;
                if ($this->spanborddet['B']['style'] == 'dashed') {
                    $s.=sprintf(' 0 j 0 J [%.3F %.3F] 0 d ',$bbw*$dashon*_MPDFK,$bbw*$dashoff*_MPDFK);
                }
                else if ($this->spanborddet['B']['style'] == 'dotted') {
                    $s.=sprintf(' 1 j 1 J [%.3F %.3F] %.3F d ',0.001,$bbw*$dot*_MPDFK,-$bbw/2*_MPDFK);
                    $short = $bbw/2;
                }
                else {
                    $s.=' 0 j 0 J [] 0 d ';
                }
                $c = $this->SetDColor($this->spanborddet['B']['c'],true);
                if ($this->spanborddet['B']['style'] == 'double') {
                    $s.=sprintf(' %s %.3F w ',$c,$bbw/3*_MPDFK);
                    $xadj = $xadj2 = 0; 
                    if ($this->spanborddet['L']['style'] == 'double') { $xadj = $this->spanborddet['L']['w']*2/3; }
                    if ($this->spanborddet['R']['style'] == 'double') { $xadj2 = $this->spanborddet['R']['w']*2/3; }
                    $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($this->x-$lbw+$xadj)*_MPDFK,($this->h-$boxbottom-$bbw/6)*_MPDFK,($this->x+$w+$rbw-$short-$xadj2)*_MPDFK,($this->h-$boxbottom-$bbw/6)*_MPDFK);
                    $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($this->x-$lbw)*_MPDFK,($this->h-$boxbottom-$bbw*5/6)*_MPDFK,($this->x+$w+$rbw-$short)*_MPDFK,($this->h-$boxbottom-$bbw*5/6)*_MPDFK);
                }
                else {
                    $s.=sprintf(' %s %.3F w ',$c,$bbw*_MPDFK);
                    $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($this->x-$lbw)*_MPDFK,($this->h-$boxbottom-$bbw/2)*_MPDFK,($this->x+$w+$rbw-$short)*_MPDFK,($this->h-$boxbottom-$bbw/2)*_MPDFK);
                }
            }
            if($lbw) {
                $short = 0;
                if ($this->spanborddet['L']['style'] == 'dashed') {
                    $s.=sprintf(' 0 j 0 J [%.3F %.3F] 0 d ',$lbw*$dashon*_MPDFK,$lbw*$dashoff*_MPDFK);
                }
                else if ($this->spanborddet['L']['style'] == 'dotted') {
                    $s.=sprintf(' 1 j 1 J [%.3F %.3F] %.3F d ',0.001,$lbw*$dot*_MPDFK,-$lbw/2*_MPDFK);
                    $short = $lbw/2;
                }
                else {
                    $s.=' 0 j 0 J [] 0 d ';
                }
                $c = $this->SetDColor($this->spanborddet['L']['c'],true);
                if ($this->spanborddet['L']['style'] == 'double') {
                    $s.=sprintf(' %s %.3F w ',$c,$lbw/3*_MPDFK);
                    $yadj = $yadj2 = 0; 
                    if ($this->spanborddet['T']['style'] == 'double') { $yadj = $this->spanborddet['T']['w']*2/3; }
                    if ($this->spanborddet['B']['style'] == 'double') { $yadj2 = $this->spanborddet['B']['w']*2/3; }
                    $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($this->x-$lbw/6)*_MPDFK,($this->h-$boxtop+$tbw-$yadj)*_MPDFK,($this->x-$lbw/6)*_MPDFK,($this->h-$boxbottom-$bbw+$short+$yadj2)*_MPDFK);
                    $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($this->x-$lbw*5/6)*_MPDFK,($this->h-$boxtop+$tbw)*_MPDFK,($this->x-$lbw*5/6)*_MPDFK,($this->h-$boxbottom-$bbw+$short)*_MPDFK);
                }
                else {
                    $s.=sprintf(' %s %.3F w ',$c,$lbw*_MPDFK);
                    $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($this->x-$lbw/2)*_MPDFK,($this->h-$boxtop+$tbw)*_MPDFK,($this->x-$lbw/2)*_MPDFK,($this->h-$boxbottom-$bbw+$short)*_MPDFK);
                }
            }
            if($rbw) {
                $short = 0;
                if ($this->spanborddet['R']['style'] == 'dashed') {
                    $s.=sprintf(' 0 j 0 J [%.3F %.3F] 0 d ',$rbw*$dashon*_MPDFK,$rbw*$dashoff*_MPDFK);
                }
                else if ($this->spanborddet['R']['style'] == 'dotted') {
                    $s.=sprintf(' 1 j 1 J [%.3F %.3F] %.3F d ',0.001,$rbw*$dot*_MPDFK,-$rbw/2*_MPDFK);
                    $short = $rbw/2;
                }
                else {
                    $s.=' 0 j 0 J [] 0 d ';
                }
                $c = $this->SetDColor($this->spanborddet['R']['c'],true);
                if ($this->spanborddet['R']['style'] == 'double') {
                    $s.=sprintf(' %s %.3F w ',$c,$rbw/3*_MPDFK);
                    $yadj = $yadj2 = 0; 
                    if ($this->spanborddet['T']['style'] == 'double') { $yadj = $this->spanborddet['T']['w']*2/3; }
                    if ($this->spanborddet['B']['style'] == 'double') { $yadj2 = $this->spanborddet['B']['w']*2/3; }
                    $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($this->x+$w+$rbw/6)*_MPDFK,($this->h-$boxtop+$tbw-$yadj)*_MPDFK,($this->x+$w+$rbw/6)*_MPDFK,($this->h-$boxbottom-$bbw+$short+$yadj2)*_MPDFK);
                    $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($this->x+$w+$rbw*5/6)*_MPDFK,($this->h-$boxtop+$tbw)*_MPDFK,($this->x+$w+$rbw*5/6)*_MPDFK,($this->h-$boxbottom-$bbw+$short)*_MPDFK);
                }
                else {
                    $s.=sprintf(' %s %.3F w ',$c,$rbw*_MPDFK);
                    $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($this->x+$w+$rbw/2)*_MPDFK,($this->h-$boxtop+$tbw)*_MPDFK,($this->x+$w+$rbw/2)*_MPDFK,($this->h-$boxbottom-$bbw+$short)*_MPDFK);
                }
            }
            $s.= ' Q ';
        }
        else {
            if ($fill==1) $op=($border==1) ? 'B' : 'f';
            else $op='S';
            $s.=sprintf('%.3F %.3F %.3F %.3F re %s ',$this->x*_MPDFK,($this->h-$boxtop)*_MPDFK,$w*_MPDFK,-$boxheight*_MPDFK,$op);
        }
    }

    if(is_string($border)) {
        $x=$this->x;
        $y=$this->y;
        if(is_int(strpos($border,'L')))
            $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',$x*_MPDFK,($this->h-$boxtop)*_MPDFK,$x*_MPDFK,($this->h-($boxbottom))*_MPDFK);
        if(is_int(strpos($border,'T')))
            $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',$x*_MPDFK,($this->h-$boxtop)*_MPDFK,($x+$w)*_MPDFK,($this->h-$boxtop)*_MPDFK);
        if(is_int(strpos($border,'R')))
            $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',($x+$w)*_MPDFK,($this->h-$boxtop)*_MPDFK,($x+$w)*_MPDFK,($this->h-($boxbottom))*_MPDFK);
        if(is_int(strpos($border,'B')))
            $s.=sprintf('%.3F %.3F m %.3F %.3F l S ',$x*_MPDFK,($this->h-($boxbottom))*_MPDFK,($x+$w)*_MPDFK,($this->h-($boxbottom))*_MPDFK);
    }

    if($txt!='') {
        if ($exactWidth)
            $stringWidth = $w;  
        else 
            $stringWidth = $this->GetStringWidth($txt) + ( $this->charspacing * mb_strlen( $txt, $this->mb_enc ) / _MPDFK )
                 + ( $this->ws * mb_substr_count( $txt, ' ', $this->mb_enc ) / _MPDFK );

        // Set x OFFSET FOR PRINTING
        if($align=='R') {
            $dx=$w-$this->cMarginR - $stringWidth - $lcpaddingR;
        }
        elseif($align=='C') {
            $dx=(($w - $stringWidth )/2);
        }
        elseif($align=='L' or $align=='J') $dx=$this->cMarginL + $lcpaddingL;
            else $dx = 0;

        if($this->ColorFlag) $s .='q '.$this->TextColor.' ';

        // OUTLINE
        if($this->textparam['outline-s'] && !$this->S) {    // mPDF 5.6.07
            $s .=' '.sprintf('%.3F w',$this->LineWidth*_MPDFK).' ';
            $s .=" $this->DrawColor ";
            $s .=" 2 Tr ";
            }
        else if ($this->falseBoldWeight && strpos($this->ReqFontStyle,"B") !== false && strpos($this->FontStyle,"B") === false && !$this->S) {  // can't use together with OUTLINE or Small Caps
            $s .= ' 2 Tr 1 J 1 j ';
            $s .= ' '.sprintf('%.3F w',($this->FontSize/130)*_MPDFK*$this->falseBoldWeight).' ';
            $tc = strtoupper($this->TextColor); // change 0 0 0 rg to 0 0 0 RG
            if($this->FillColor!=$tc) { $s .= ' '.$tc.' '; }        // stroke (outline) = same colour as text(fill)
        }
        else { $s .=" 0 Tr "; } // mPDF 5.6.07

        if (strpos($this->ReqFontStyle,"I") !== false && strpos($this->FontStyle,"I") === false) {  // Artificial italic
            $aix = '1 0 0.261799 1 %.3F %.3F Tm '; 
        }
        else { $aix = '%.3F %.3F Td '; }

        // THE TEXT
        $sub = '';
        $this->CurrentFont['used']= true;

        // WORD SPACING
        // IF multibyte - Tw has no effect - need to use alternative method - do word spacing using an adjustment before each space
        if ($this->ws && !$this->usingCoreFont && !$this->CurrentFont['sip'] && !$this->CurrentFont['smp'] && !$this->S) {
          $sub .= ' BT 0 Tw ET ';    
          if ($this->kerning && $this->useKerning) { $sub .= $this->_kern($txt, 'MBTw', $aix, ($this->x+$dx), ($this->y+$baseline+$va)); }
          else {
            $space = " ";
            //Convert string to UTF-16BE without BOM
            $space= $this->UTF8ToUTF16BE($space , false);
            $space=$this->_escape($space ); 
            $sub .=sprintf('BT '.$aix,($this->x+$dx)*_MPDFK,($this->h-($this->y+$baseline+$va))*_MPDFK);
            $t = explode(' ',$txt);
            $sub .=sprintf(' %.3F Tc [',$this->charspacing);
            $numt = count($t);
            for($i=0;$i<$numt;$i++) {
                $tx = $t[$i]; 
                //Convert string to UTF-16BE without BOM
                $tx = $this->UTF8ToUTF16BE($tx , false);
                $tx = $this->_escape($tx); 
                $sub .=sprintf('(%s) ',$tx);
                if (($i+1)<$numt) {
                    $adj = -($this->ws)*1000/$this->FontSizePt;
                    $sub .=sprintf('%d(%s) ',$adj,$space);
                }
            }
            $sub .='] TJ ';
            $sub .=' ET';
          }
        }
        else {
          $txt2= $txt;
          if ($this->CurrentFont['type']=='TTF' && ($this->CurrentFont['sip'] || $this->CurrentFont['smp'])) {
            if ($this->S) { $sub .= $this->_smallCaps($txt2, 'SIPSMP', $aix, $dx, _MPDFK, $baseline, $va); } 
            else {
                $txt2 = $this->UTF8toSubset($txt2);
                $sub .=sprintf('BT '.$aix.' %s Tj ET',($this->x+$dx)*_MPDFK,($this->h-($this->y+$baseline+$va))*_MPDFK,$txt2);
            }
          }
          else {
            if ($this->S) { $sub .= $this->_smallCaps($txt2, '', $aix, $dx, _MPDFK, $baseline, $va); } 
            else if ($this->kerning && $this->useKerning) { $sub .= $this->_kern($txt2, '', $aix, ($this->x+$dx), ($this->y+$baseline+$va)); } 
            else {
                if (!$this->usingCoreFont) {
                    $txt2 = $this->UTF8ToUTF16BE($txt2, false);
                }
                $txt2=$this->_escape($txt2); 
                $sub .=sprintf('BT '.$aix.' (%s) Tj ET',($this->x+$dx)*_MPDFK,($this->h-($this->y+$baseline+$va))*_MPDFK,$txt2);
            }
          }
        }
        // UNDERLINE
        if($this->U) {
            $c = strtoupper($this->TextColor); // change 0 0 0 rg to 0 0 0 RG
            if($this->FillColor!=$c) { $sub .= ' '.$c.' '; }
            if (isset($this->CurrentFont['up'])) { $up=$this->CurrentFont['up']; }
            else { $up = -100; }
            $adjusty = (-$up/1000* $this->FontSize);
            if (isset($this->CurrentFont['ut'])) { $ut=$this->CurrentFont['ut']/1000* $this->FontSize; }
            else { $ut = 60/1000* $this->FontSize; }
            $olw = $this->LineWidth;
            $sub .=' '.(sprintf(' %.3F w 0 j 0 J ',$ut*_MPDFK));
            $sub .=' '.$this->_dounderline($this->x+$dx,$this->y+$baseline+$va+$adjusty,$txt);
            $sub .=' '.(sprintf(' %.3F w 2 j 2 J ',$olw*_MPDFK));
            if($this->FillColor!=$c) { $sub .= ' '.$this->FillColor.' '; }
        }

        // STRIKETHROUGH
        if($this->strike) {
            $c = strtoupper($this->TextColor); // change 0 0 0 rg to 0 0 0 RG
            if($this->FillColor!=$c) { $sub .= ' '.$c.' '; }
                //Superscript and Subscript Y coordinate adjustment (now for striked-through texts)
            if (isset($this->CurrentFont['desc']['CapHeight'])) { $ch=$this->CurrentFont['desc']['CapHeight']; }
            else { $ch = 700; }
            $adjusty = (-$ch/1000* $this->FontSize) * 0.35;
            if (isset($this->CurrentFont['ut'])) { $ut=$this->CurrentFont['ut']/1000* $this->FontSize; }
            else { $ut = 60/1000* $this->FontSize; }
            $olw = $this->LineWidth;
            $sub .=' '.(sprintf(' %.3F w 0 j 0 J ',$ut*_MPDFK));
            $sub .=' '.$this->_dounderline($this->x+$dx,$this->y+$baseline+$va+$adjusty,$txt);
            $sub .=' '.(sprintf(' %.3F w 2 j 2 J ',$olw*_MPDFK));
            if($this->FillColor!=$c) { $sub .= ' '.$this->FillColor.' '; }
        }

        // TEXT SHADOW
        if ($this->textshadow) {        // First to process is last in CSS comma separated shadows
            foreach($this->textshadow AS $ts) {
                    $s .= ' q ';
                    $s .= $this->SetTColor($ts['col'], true)."\n";
                    if ($ts['col']{0}==5 && ord($ts['col']{4})<100) {   // RGBa
                        $s .= $this->SetAlpha(ord($ts['col']{4})/100, 'Normal', true, 'F')."\n"; 
                    }
                    else if ($ts['col']{0}==6 && ord($ts['col']{5})<100) {  // CMYKa
                        $s .= $this->SetAlpha(ord($ts['col']{5})/100, 'Normal', true, 'F')."\n"; 
                    }
                    else if ($ts['col']{0}==1 && $ts['col']{2}==1 && ord($ts['col']{3})<100) {  // Gray
                        $s .= $this->SetAlpha(ord($ts['col']{3})/100, 'Normal', true, 'F')."\n"; 
                    }
                    $s .= sprintf(' 1 0 0 1 %.4F %.4F cm', $ts['x']*_MPDFK, -$ts['y']*_MPDFK)."\n";
                    $s .= $sub;
                    $s .= ' Q ';
            }
        }

        $s .= $sub;

        // COLOR
        if($this->ColorFlag) $s .=' Q';

        // LINK
        if($link!='') {
            $this->Link($this->x,$boxtop,$w,$boxheight,$link);
        }
    }
    if($s) $this->_out($s);

    // WORD SPACING
    if ($this->ws && !$this->usingCoreFont) {
        $this->_out(sprintf('BT %.3F Tc ET',$this->charspacing));    
    }
    $this->lasth=$h;
    if( strpos($txt,"\n") !== false) $ln=1; // cell recognizes \n from <BR> tag
    if($ln>0)
    {
        //Go to next line
        $this->y += $h;
        if($ln==1) {
            //Move to next line
            if ($currentx != 0) { $this->x=$currentx; }
            else { $this->x=$this->lMargin; }
        }
    }
    else $this->x+=$w;


}


function _kern($txt, $mode, $aix, $x, $y) {
   if ($mode == 'MBTw') {   // Multibyte requiring word spacing
          $space = ' ';
          //Convert string to UTF-16BE without BOM
          $space= $this->UTF8ToUTF16BE($space , false);
          $space=$this->_escape($space ); 
          $s = sprintf(' BT '.$aix,$x*_MPDFK,($this->h-$y)*_MPDFK);
          $t = explode(' ',$txt);
          for($i=0;$i<count($t);$i++) {
            $tx = $t[$i]; 

            $tj = '(';
            $unicode = $this->UTF8StringToArray($tx);
            for($ti=0;$ti<count($unicode);$ti++) {
                if ($ti > 0 && isset($this->CurrentFont['kerninfo'][$unicode[($ti-1)]][$unicode[$ti]]))  {
                            $kern = -$this->CurrentFont['kerninfo'][$unicode[($ti-1)]][$unicode[$ti]];
                            $tj .= sprintf(')%d(',$kern);
                }
                $tc = code2utf($unicode[$ti]);
                $tc = $this->UTF8ToUTF16BE($tc, false);
                $tj .= $this->_escape($tc); 
            }
            $tj .= ')';
            $s.=sprintf(' %.3F Tc [%s] TJ',$this->charspacing,$tj);


            if (($i+1)<count($t)) {
                $s.=sprintf(' %.3F Tc (%s) Tj',$this->ws+$this->charspacing,$space);
            }
          }
          $s.=' ET ';
   }
   else if (!$this->usingCoreFont) {
    $s = '';
    $tj = '(';
    $unicode = $this->UTF8StringToArray($txt);
    for($i=0;$i<count($unicode);$i++) {
        if ($i > 0 && isset($this->CurrentFont['kerninfo'][$unicode[($i-1)]][$unicode[$i]])) {
                    $kern = -$this->CurrentFont['kerninfo'][$unicode[($i-1)]][$unicode[$i]];
                    $tj .= sprintf(')%d(',$kern);
        }
        $tx = code2utf($unicode[$i]);
        $tx = $this->UTF8ToUTF16BE($tx, false);
        $tj .= $this->_escape($tx); 
    }
    $tj .= ')';
    $s.=sprintf(' BT '.$aix.' [%s] TJ ET ',$x*_MPDFK,($this->h-$y)*_MPDFK,$tj);
   }
   else {   // CORE Font
    $s = '';
    $tj = '(';
    $l = strlen($txt);
    for($i=0;$i<$l;$i++) {
        if ($i > 0 && isset($this->CurrentFont['kerninfo'][$txt[($i-1)]][$txt[$i]])) {
            $kern = -$this->CurrentFont['kerninfo'][$txt[($i-1)]][$txt[$i]];
            $tj .= sprintf(')%d(',$kern);
        }
        $tj .= $this->_escape($txt[$i]); 
    }
    $tj .= ')';
    $s.=sprintf(' BT '.$aix.' [%s] TJ ET ',$x*_MPDFK,($this->h-$y)*_MPDFK,$tj);
   }

   return $s;
}


function _smallCaps($txt, $mode, $aix, $dx, $k, $baseline, $va) {
    $upp = false;
    $str = array();
    $bits = array();
    if (!$this->usingCoreFont) { 
       $unicode = $this->UTF8StringToArray($txt);
       foreach($unicode as $char) {
        if ($this->ws && $char == 32) {     // space
            if (count($str)) { $bits[] = array($upp, $str, false); }
            $bits[] = array(false, array(32), true); 
            $str = array(); 
            $upp = false;
        }
        else if (isset($this->upperCase[$char])) { 
            if (!$upp) { 
                if (count($str)) { $bits[] = array($upp, $str, false); }
                $str = array(); 
            }
            $str[] = $this->upperCase[$char]; 
            if ((!isset($this->CurrentFont['sip']) || !$this->CurrentFont['sip']) && (!isset($this->CurrentFont['smp']) || !$this->CurrentFont['smp'])) {   
                $this->CurrentFont['subset'][$this->upperCase[$char]] = $this->upperCase[$char];
            }
            $upp = true;
        }
        else { 
            if ($upp) { 
                if (count($str)) { $bits[] = array($upp, $str, false); }
                $str = array(); 
            }
            $str[] = $char;
            $upp = false;
        }
       }
    }
    else {
       for($i=0;$i<strlen($txt);$i++) {
        if (isset($this->upperCase[ord($txt[$i])]) && $this->upperCase[ord($txt[$i])] < 256) { 
            if (!$upp) { 
                if (count($str)) { $bits[] = array($upp, $str, false); }
                $str = array(); 
            }
            $str[] = $this->upperCase[ord($txt[$i])]; 
            $upp = true;
        }
        else { 
            if ($upp) { 
                if (count($str)) { $bits[] = array($upp, $str, false); }
                $str = array(); 
            }
            $str[] = ord($txt[$i]);
            $upp = false;
        }
       }
    }
    if (count($str)) { $bits[] = array($upp, $str, false); }

    $fid = $this->CurrentFont['i'];

    $s=sprintf(' BT '.$aix,($this->x+$dx)*$k,($this->h-($this->y+$baseline+$va))*$k);
    foreach($bits AS $b) {
        if ($b[0]) { $upp = true; }
        else { $upp = false; }

        $size = count ($b[1]);
        $txt = '';
        for ($i = 0; $i < $size; $i++) {
            $txt .= code2utf($b[1][$i]); 
        }
        if ($this->usingCoreFont) { 
            $txt = utf8_decode($txt);
        }
        if ($mode == 'SIPSMP') {
            $txt = $this->UTF8toSubset($txt);
        }
        else { 
            if (!$this->usingCoreFont) {
                $txt = $this->UTF8ToUTF16BE($txt, false);
            }
            $txt=$this->_escape($txt); 
            $txt = '('.$txt.')';
        }
        if ($b[2]) { // space
            $s.=sprintf(' /F%d %.3F Tf %d Tz', $fid, $this->FontSizePt, 100); 
            $s.=sprintf(' %.3F Tc', ($this->charspacing+$this->ws));
            $s.=sprintf(' %s Tj', $txt);
        }
        else if ($upp) { 
            $s.=sprintf(' /F%d %.3F Tf', $fid, $this->FontSizePt*$this->smCapsScale); 
            $s.=sprintf(' %d Tz', $this->smCapsStretch); 
            $s.=sprintf(' %.3F Tc', ($this->charspacing*100/$this->smCapsStretch));
            $s.=sprintf(' %s Tj', $txt);
        }
        else { 
            $s.=sprintf(' /F%d %.3F Tf %d Tz', $fid, $this->FontSizePt, 100); 
            $s.=sprintf(' %.3F Tc', ($this->charspacing)); 
            $s.=sprintf(' %s Tj', $txt);
        }
    }
    $s.=' ET ';
    return $s;
}


function MultiCell($w,$h,$txt,$border=0,$align='',$fill=0,$link='',$directionality='ltr',$encoded=false)
{
    // Parameter (pre-)encoded - When called internally from ToC or textarea: mb_encoding already done - but not reverse RTL/Indic
    if (!$encoded) {
        $txt = $this->purify_utf8_text($txt);
        if ($this->text_input_as_HTML) {
            $txt = $this->all_entities_to_utf8($txt);
        }
        if ($this->usingCoreFont) { $txt = mb_convert_encoding($txt,$this->mb_enc,'UTF-8'); }
        // Font-specific ligature substitution for Indic fonts
        else if (isset($this->CurrentFont['indic']) && $this->CurrentFont['indic']) {   // *INDIC*
            $this->ConvertIndic($tmp);  // *INDIC*
        }   // *INDIC*
        if (preg_match("/([".$this->pregRTLchars."])/u", $txt)) { $this->biDirectional = true; }    // *RTL*
    }
    if (!$align) { $align = $this->defaultAlign; }

    //Output text with automatic or explicit line breaks
    $cw=&$this->CurrentFont['cw'];
    if($w==0)   $w=$this->w-$this->rMargin-$this->x;

    $wmax = ($w - ($this->cMarginL+$this->cMarginR));
    if ($this->usingCoreFont)  {
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        while($nb>0 and $s[$nb-1]=="\n")    $nb--;
    }
    else {
        $s=str_replace("\r",'',$txt);
        $nb=mb_strlen($s, $this->mb_enc );
        while($nb>0 and mb_substr($s,$nb-1,1,$this->mb_enc )=="\n") $nb--;
    }
    $b=0;
    if($border) {
        if($border==1) {
            $border='LTRB';
            $b='LRT';
            $b2='LR';
        }
        else {
            $b2='';
            if(is_int(strpos($border,'L'))) $b2.='L';
            if(is_int(strpos($border,'R'))) $b2.='R';
            $b=is_int(strpos($border,'T')) ? $b2.'T' : $b2;
        }
    }
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $ns=0;
    $nl=1;



   if (!$this->usingCoreFont)  {
    $checkCursive=false;
    if ($this->biDirectional) {  $checkCursive=true; }
    else if (isset($this->CurrentFont['indic']) && $this->CurrentFont['indic']) {  $checkCursive=true; }    // *INDIC*
    while($i<$nb) {
        //Get next character
        $c = mb_substr($s,$i,1,$this->mb_enc );
        if($c == "\n") {
            //Explicit line break
            // WORD SPACING
            $this->ResetSpacing();
            $tmp = rtrim(mb_substr($s,$j,$i-$j,$this->mb_enc));
            // DIRECTIONALITY
            $this->magic_reverse_dir($tmp, true, $directionality);  // *RTL*

            $this->Cell($w,$h,$tmp,$b,2,$align,$fill,$link);
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $ns=0;
            $nl++;
            if($border and $nl==2) $b=$b2;
            continue;
        }
        if($c == " ") {
            $sep=$i;
            $ls=$l;
            $ns++;
        }

        $l += $this->GetCharWidthNonCore($c);

        if($l>$wmax) {
            //Automatic line break
            if($sep==-1) {  // Only one word
                if($i==$j) $i++;
                // WORD SPACING
                $this->ResetSpacing();
                $tmp = rtrim(mb_substr($s,$j,$i-$j,$this->mb_enc));
                // DIRECTIONALITY
                $this->magic_reverse_dir($tmp, true, $directionality);  // *RTL*

                $this->Cell($w,$h,$tmp,$b,2,$align,$fill,$link);
            }
            else {
                $tmp = rtrim(mb_substr($s,$j,$sep-$j,$this->mb_enc));
                if($align=='J') {
                    //////////////////////////////////////////
                    // JUSTIFY J using Unicode fonts (Word spacing doesn't work)
                    // WORD SPACING UNICODE
                    // Change NON_BREAKING SPACE to spaces so they are 'spaced' properly
                    $tmp = str_replace(chr(194).chr(160),chr(32),$tmp ); 
                    $len_ligne = $this->GetStringWidth($tmp );
                    $nb_carac = mb_strlen( $tmp , $this->mb_enc ) ;  
                    $nb_spaces = mb_substr_count( $tmp ,' ', $this->mb_enc ) ;  

                    $inclCursive=false;
                    if ($checkCursive) {
                        if (preg_match("/([".$this->pregRTLchars."])/u", $tmp)) { $inclCursive = true; }    // *RTL*
                        if (preg_match("/([".$this->pregHIchars.$this->pregBNchars.$this->pregPAchars."])/u", $tmp)) { $inclCursive = true; }   // *INDIC*
                    }
                    list($charspacing,$ws) = $this->GetJspacing($nb_carac,$nb_spaces,((($wmax) - $len_ligne) * _MPDFK),$inclCursive);
                    $this->SetSpacing($charspacing,$ws);
                    //////////////////////////////////////////
                }

                // DIRECTIONALITY
                $this->magic_reverse_dir($tmp, true, $directionality);  // *RTL*

                $this->Cell($w,$h,$tmp,$b,2,$align,$fill,$link);
                $i=$sep+1;
            }
            $sep=-1;
            $j=$i;
            $l=0;
            $ns=0;
            $nl++;
            if($border and $nl==2) $b=$b2;
        }
        else $i++;
    }
    //Last chunk
    // WORD SPACING

    $this->ResetSpacing();

   }


   else {

    while($i<$nb) {
        //Get next character
        $c=$s[$i];
        if($c == "\n") {
            //Explicit line break
            // WORD SPACING
            $this->ResetSpacing();
            $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill,$link);
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $ns=0;
            $nl++;
            if($border and $nl==2) $b=$b2;
            continue;
        }
        if($c == " ") {
            $sep=$i;
            $ls=$l;
            $ns++;
        }

        $l += $this->GetCharWidthCore($c);
        if($l>$wmax) {
            //Automatic line break
            if($sep==-1) {
                if($i==$j) $i++;
                // WORD SPACING
                $this->ResetSpacing();
                $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill,$link);
            }
            else {
                if($align=='J') {
                    $tmp = rtrim(substr($s,$j,$sep-$j));
                    //////////////////////////////////////////
                    // JUSTIFY J using Unicode fonts (Word spacing doesn't work)
                    // WORD SPACING NON_UNICDOE/CJK
                    // Change NON_BREAKING SPACE to spaces so they are 'spaced' properly
                    $tmp = str_replace(chr(160),chr(32),$tmp);
                    $len_ligne = $this->GetStringWidth($tmp );
                    $nb_carac = strlen( $tmp ) ;  
                    $nb_spaces = substr_count( $tmp ,' ' ) ;  
                    list($charspacing,$ws) = $this->GetJspacing($nb_carac,$nb_spaces,((($wmax) - $len_ligne) * _MPDFK),false);
                    $this->SetSpacing($charspacing,$ws);
                    //////////////////////////////////////////
                }
                $this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill,$link);
                $i=$sep+1;
            }
            $sep=-1;
            $j=$i;
            $l=0;
            $ns=0;
            $nl++;
            if($border and $nl==2) $b=$b2;
        }
        else $i++;
    }
    //Last chunk
    // WORD SPACING

    $this->ResetSpacing();

   }
    //Last chunk
   if($border and is_int(strpos($border,'B')))  $b.='B';
   if (!$this->usingCoreFont)  {
        $tmp = rtrim(mb_substr($s,$j,$i-$j,$this->mb_enc));
        // DIRECTIONALITY
        $this->magic_reverse_dir($tmp, true, $directionality);  // *RTL*
        $this->Cell($w,$h,$tmp,$b,2,$align,$fill,$link);
   }
   else { $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill,$link); }
   $this->x=$this->lMargin;
}


/*-- DIRECTW --*/
function Write($h,$txt,$currentx=0,$link='',$directionality='ltr',$align='') {
    if (!class_exists('directw', false)) { include(_MPDF_PATH.'classes/directw.php'); }
    if (empty($this->directw)) { $this->directw = new directw($this); }
    $this->directw->Write($h,$txt,$currentx,$link,$directionality,$align);
}
/*-- END DIRECTW --*/


/*-- HTML-CSS --*/
function saveInlineProperties() {
    $saved = array();
    $saved[ 'family' ] = $this->FontFamily;
    $saved[ 'style' ] = $this->FontStyle;
    $saved[ 'sizePt' ] = $this->FontSizePt;
    $saved[ 'size' ] = $this->FontSize;
    $saved[ 'HREF' ] = $this->HREF; 
    $saved[ 'underline' ] = $this->U; 
    $saved[ 'smCaps' ] = $this->S;
    $saved[ 'strike' ] = $this->strike;
    $saved[ 'textshadow' ] = $this->textshadow;
    $saved[ 'SUP' ] = $this->SUP; 
    $saved[ 'SUB' ] = $this->SUB; 
    $saved[ 'linewidth' ] = $this->LineWidth;
    $saved[ 'drawcolor' ] = $this->DrawColor;
    $saved[ 'textparam' ] = $this->textparam;
    $saved[ 'toupper' ] = $this->toupper;
    $saved[ 'tolower' ] = $this->tolower;
    $saved[ 'capitalize' ] = $this->capitalize;
    $saved[ 'fontkerning' ] = $this->kerning;
    $saved[ 'lSpacingCSS' ] = $this->lSpacingCSS;
    $saved[ 'wSpacingCSS' ] = $this->wSpacingCSS;
    $saved[ 'I' ] = $this->I;
    $saved[ 'B' ] = $this->B;
    $saved[ 'colorarray' ] = $this->colorarray;
    $saved[ 'bgcolorarray' ] = $this->spanbgcolorarray;
    $saved[ 'border' ] = $this->spanborddet;
    $saved[ 'color' ] = $this->TextColor; 
    $saved[ 'bgcolor' ] = $this->FillColor;
    $saved[ 'lang' ] = $this->currentLang;
    $saved[ 'display_off' ] = $this->inlineDisplayOff;

    return $saved;
}

function restoreInlineProperties( &$saved) {
    $FontFamily = $saved[ 'family' ];
    $this->FontStyle = $saved[ 'style' ];
    $this->FontSizePt = $saved[ 'sizePt' ];
    $this->FontSize = $saved[ 'size' ];

    $this->currentLang =  $saved['lang'];
    if ($this->useLang && !$this->usingCoreFont) {
      if ($this->currentLang != $this->default_lang && ((strlen($this->currentLang) == 5 && $this->currentLang != 'UTF-8') || strlen($this->currentLang ) == 2)) { 
        list ($coreSuitable,$mpdf_pdf_unifonts) = GetLangOpts($this->currentLang, $this->useAdobeCJK);
        if ($mpdf_pdf_unifonts) { $this->RestrictUnicodeFonts($mpdf_pdf_unifonts); }
        else { $this->RestrictUnicodeFonts($this->default_available_fonts ); }
      }
      else { 
        $this->RestrictUnicodeFonts($this->default_available_fonts );
      } 
    }

    $this->ColorFlag = ($this->FillColor != $this->TextColor); //Restore ColorFlag as well

    $this->HREF = $saved[ 'HREF' ];
    $this->U = $saved[ 'underline' ];
    $this->S = $saved[ 'smCaps' ];
    $this->strike = $saved[ 'strike' ];
    $this->textshadow = $saved[ 'textshadow' ];
    $this->SUP = $saved[ 'SUP' ];
    $this->SUB = $saved[ 'SUB' ];
    $this->LineWidth = $saved[ 'linewidth' ];
    $this->DrawColor = $saved[ 'drawcolor' ];
    $this->textparam = $saved[ 'textparam' ];
    $this->inlineDisplayOff = $saved['display_off'];

    $this->toupper = $saved[ 'toupper' ];
    $this->tolower = $saved[ 'tolower' ];
    $this->capitalize = $saved[ 'capitalize' ];
    $this->kerning = $saved[ 'fontkerning' ];
    $this->lSpacingCSS = $saved[ 'lSpacingCSS' ];
    if (($this->lSpacingCSS || $this->lSpacingCSS==='0') && strtoupper($this->lSpacingCSS) != 'NORMAL') {
        $this->fixedlSpacing = $this->ConvertSize($this->lSpacingCSS,$this->FontSize);
    }
    else { $this->fixedlSpacing = false; }
    $this->wSpacingCSS = $saved[ 'wSpacingCSS' ];
    if ($this->wSpacingCSS && strtoupper($this->wSpacingCSS) != 'NORMAL') { 
        $this->minwSpacing = $this->ConvertSize($this->wSpacingCSS,$this->FontSize);
    }
    else { $this->minwSpacing = 0; }
  
    $this->SetFont($FontFamily, $saved[ 'style' ].($this->U ? 'U' : '').($this->S ? 'S' : ''),$saved[ 'sizePt' ],false);

    $this->currentfontstyle = $saved[ 'style' ].($this->U ? 'U' : '').($this->S ? 'S' : '');
    $this->currentfontsize = $saved[ 'sizePt' ];
    $this->SetStylesArray(array('S'=>$this->S, 'U'=>$this->U, 'B'=>$saved[ 'B' ], 'I'=>$saved[ 'I' ]));

    $this->TextColor = $saved[ 'color' ];
    $this->FillColor = $saved[ 'bgcolor' ];
    $this->colorarray = $saved[ 'colorarray' ];
    $cor = $saved[ 'colorarray' ];
    if ($cor) $this->SetTColor($cor);
    $this->spanbgcolorarray = $saved[ 'bgcolorarray' ];
    $cor = $saved[ 'bgcolorarray' ];
    if ($cor) $this->SetFColor($cor);
    $this->spanborddet = $saved[ 'border' ];
}



// Used when ColActive for tables - updated to return first block with background fill OR borders
function GetFirstBlockFill() {
    // Returns the first blocklevel that uses a bgcolor fill
    $startfill = 0;
    for ($i=1;$i<=$this->blklvl;$i++) {
        if ($this->blk[$i]['bgcolor'] || $this->blk[$i]['border_left']['w'] || $this->blk[$i]['border_right']['w']  || $this->blk[$i]['border_top']['w']  || $this->blk[$i]['border_bottom']['w']  ) {
            $startfill = $i;
            break;
        }
    }
    return $startfill;
}

function SetBlockFill($blvl) {
    if ($this->blk[$blvl]['bgcolor']) {
        $this->SetFColor($this->blk[$blvl]['bgcolorarray']);
        return 1;
    }
    else {
        $this->SetFColor($this->ConvertColor(255));
        return 0;
    }
}


//-------------------------FLOWING BLOCK------------------------------------//
//The following functions were originally written by Damon Kohler           //
//--------------------------------------------------------------------------//

function saveFont() {
    $saved = array();
    $saved[ 'family' ] = $this->FontFamily;
    $saved[ 'style' ] = $this->FontStyle;
    $saved[ 'sizePt' ] = $this->FontSizePt;
    $saved[ 'size' ] = $this->FontSize;
    $saved[ 'curr' ] = &$this->CurrentFont;
    $saved[ 'color' ] = $this->TextColor; 
    $saved[ 'spanbgcolor' ] = $this->spanbgcolor; 
    $saved[ 'spanbgcolorarray' ] = $this->spanbgcolorarray; 
    $saved[ 'bord' ] = $this->spanborder;
    $saved[ 'border' ] = $this->spanborddet;
    $saved[ 'HREF' ] = $this->HREF;
    $saved[ 'underline' ] = $this->U; 
    $saved[ 'smCaps' ] = $this->S;
    $saved[ 'strike' ] = $this->strike;
    $saved[ 'textshadow' ] = $this->textshadow;
    $saved[ 'SUP' ] = $this->SUP;
    $saved[ 'SUB' ] = $this->SUB;
    $saved[ 'linewidth' ] = $this->LineWidth;
    $saved[ 'drawcolor' ] = $this->DrawColor;
    $saved[ 'textparam' ] = $this->textparam;
    $saved[ 'ReqFontStyle' ] = $this->ReqFontStyle;
    $saved[ 'fontkerning' ] = $this->kerning; 
    $saved[ 'fixedlSpacing' ] = $this->fixedlSpacing;
    $saved[ 'minwSpacing' ] = $this->minwSpacing;
    return $saved;
}

function restoreFont( &$saved, $write=true) {
    if (!isset($saved) || empty($saved)) return;

    $this->FontFamily = $saved[ 'family' ];
    $this->FontStyle = $saved[ 'style' ];
    $this->FontSizePt = $saved[ 'sizePt' ];
    $this->FontSize = $saved[ 'size' ];
    $this->CurrentFont = &$saved[ 'curr' ];
    $this->TextColor = $saved[ 'color' ]; 
    $this->spanbgcolor = $saved[ 'spanbgcolor' ]; 
    $this->spanbgcolorarray = $saved[ 'spanbgcolorarray' ]; 
    $this->spanborder = $saved[ 'bord' ];
    $this->spanborddet = $saved[ 'border' ];
    $this->ColorFlag = ($this->FillColor != $this->TextColor); //Restore ColorFlag as well
    $this->HREF = $saved[ 'HREF' ]; 
    $this->U = $saved[ 'underline' ]; 
    $this->S = $saved[ 'smCaps' ];
    $this->kerning = $saved[ 'fontkerning' ];
    $this->fixedlSpacing = $saved[ 'fixedlSpacing' ];
    $this->minwSpacing = $saved[ 'minwSpacing' ];
    $this->strike = $saved[ 'strike' ]; 
    $this->textshadow = $saved[ 'textshadow' ];
    $this->SUP = $saved[ 'SUP' ]; 
    $this->SUB = $saved[ 'SUB' ]; 
    $this->LineWidth = $saved[ 'linewidth' ]; 
    $this->DrawColor = $saved[ 'drawcolor' ]; 
    $this->textparam = $saved[ 'textparam' ];
    if ($write) { 
        $this->SetFont($saved[ 'family' ],$saved[ 'style' ].($this->U ? 'U' : '').($this->S ? 'S' : ''),$saved[ 'sizePt' ],true,true);  // force output
        $fontout = (sprintf('BT /F%d %.3F Tf ET', $this->CurrentFont['i'], $this->FontSizePt));
        if($this->page>0 && ((isset($this->pageoutput[$this->page]['Font']) && $this->pageoutput[$this->page]['Font'] != $fontout) || !isset($this->pageoutput[$this->page]['Font']) || $this->keep_block_together)) { $this->_out($fontout); }
        $this->pageoutput[$this->page]['Font'] = $fontout;
    }
    else 
        $this->SetFont($saved[ 'family' ],$saved[ 'style' ].($this->U ? 'U' : '').($this->S ? 'S' : ''),$saved[ 'sizePt' ]);
    $this->ReqFontStyle = $saved[ 'ReqFontStyle' ];
}

function newFlowingBlock( $w, $h, $a = '', $is_table = false, $is_list = false, $blockstate = 0, $newblock=true, $blockdir='ltr')
{
    if (!$a) { 
        if ($blockdir=='rtl') { $a = 'R'; }
        else { $a = 'L'; }
    }
    $this->flowingBlockAttr[ 'width' ] = ($w * _MPDFK);
    // line height in user units
    $this->flowingBlockAttr[ 'is_table' ] = $is_table;
    $this->flowingBlockAttr[ 'is_list' ] = $is_list;
    $this->flowingBlockAttr[ 'height' ] = $h;
    $this->flowingBlockAttr[ 'lineCount' ] = 0;
    $this->flowingBlockAttr[ 'align' ] = $a;
    $this->flowingBlockAttr[ 'font' ] = array();
    $this->flowingBlockAttr[ 'content' ] = array();
    $this->flowingBlockAttr[ 'contentB' ] = array();
    $this->flowingBlockAttr[ 'contentWidth' ] = 0;
    $this->flowingBlockAttr[ 'blockstate' ] = $blockstate;

    $this->flowingBlockAttr[ 'newblock' ] = $newblock;
    $this->flowingBlockAttr[ 'valign' ] = 'M';
    $this->flowingBlockAttr['blockdir'] = $blockdir;

}

function finishFlowingBlock($endofblock=false, $next='') {
    $currentx = $this->x;
    //prints out the last chunk
    $is_table = $this->flowingBlockAttr[ 'is_table' ];
    $is_list = $this->flowingBlockAttr[ 'is_list' ];
    $maxWidth =& $this->flowingBlockAttr[ 'width' ];
    $lineHeight =& $this->flowingBlockAttr[ 'height' ];
    $align =& $this->flowingBlockAttr[ 'align' ];
    $content =& $this->flowingBlockAttr[ 'content' ];
    $contentB =& $this->flowingBlockAttr[ 'contentB' ];
    $font =& $this->flowingBlockAttr[ 'font' ];
    $contentWidth =& $this->flowingBlockAttr[ 'contentWidth' ];
    $lineCount =& $this->flowingBlockAttr[ 'lineCount' ];
    $valign =& $this->flowingBlockAttr[ 'valign' ];
    $blockstate = $this->flowingBlockAttr[ 'blockstate' ];

    $newblock = $this->flowingBlockAttr[ 'newblock' ];
    $blockdir = $this->flowingBlockAttr['blockdir'];


    // *********** BLOCK BACKGROUND COLOR *****************//
    if ($this->blk[$this->blklvl]['bgcolor'] && !$is_table) {
        $fill = 0;
    }
    else {
        $this->SetFColor($this->ConvertColor(255));
        $fill = 0;
    }

    $hanger = '';   // mPDF 5.6.40

    // Always right trim!
    // Right trim content and adjust width if need to justify (later)
        if (isset($content[count($content)-1]) && preg_match('/[ ]+$/',$content[count($content)-1], $m)) {
            $strip = strlen($m[0]);
            $content[count($content)-1] = substr($content[count($content)-1],0,(strlen($content[count($content)-1])-$strip));
            $this->restoreFont( $font[ count($content)-1 ],false );
            $contentWidth -= $this->GetStringWidth($m[0]) * _MPDFK;
        }

    // the amount of space taken up so far in user units
    $usedWidth = 0;

    // COLS
    $oldcolumn = $this->CurrCol;

    if ($this->ColActive && !$is_table) { $this->breakpoints[$this->CurrCol][] = $this->y; }    // *COLUMNS*

    // Print out each chunk

/*-- TABLES --*/
    if ($is_table) { 
        $ipaddingL = 0; 
        $ipaddingR = 0; 
        $paddingL = 0;
        $paddingR = 0;
    } 
    else { 
/*-- END TABLES --*/
        $ipaddingL = $this->blk[$this->blklvl]['padding_left']; 
        $ipaddingR = $this->blk[$this->blklvl]['padding_right']; 
        $paddingL = ($ipaddingL * _MPDFK); 
        $paddingR = ($ipaddingR * _MPDFK);
        $this->cMarginL =  $this->blk[$this->blklvl]['border_left']['w'];
        $this->cMarginR =  $this->blk[$this->blklvl]['border_right']['w'];

        // Added mPDF 3.0 Float DIV
        $fpaddingR = 0;
        $fpaddingL = 0;
/*-- CSS-FLOAT --*/
        if (count($this->floatDivs)) {
            list($l_exists, $r_exists, $l_max, $r_max, $l_width, $r_width) = $this->GetFloatDivInfo($this->blklvl);
            if ($r_exists) { $fpaddingR = $r_width; }
            if ($l_exists) { $fpaddingL = $l_width; }
        }
/*-- END CSS-FLOAT --*/

        $usey = $this->y + 0.002;
        if (($newblock) && ($blockstate==1 || $blockstate==3) && ($lineCount == 0) ) { 
            $usey += $this->blk[$this->blklvl]['margin_top'] + $this->blk[$this->blklvl]['padding_top'] + $this->blk[$this->blklvl]['border_top']['w'];
        }
/*-- CSS-IMAGE-FLOAT --*/
        // If float exists at this level
        if (isset($this->floatmargins['R']) && $usey <= $this->floatmargins['R']['y1'] && $usey >= $this->floatmargins['R']['y0'] && !$this->floatmargins['R']['skipline']) { $fpaddingR += $this->floatmargins['R']['w']; }
        if (isset($this->floatmargins['L']) && $usey <= $this->floatmargins['L']['y1'] && $usey >= $this->floatmargins['L']['y0'] && !$this->floatmargins['L']['skipline']) { $fpaddingL += $this->floatmargins['L']['w']; }
/*-- END CSS-IMAGE-FLOAT --*/
    }   // *TABLES*

        // Set Current lineheight (correction factor)
        $lhfixed = false; 
/*-- LISTS --*/
        if ($is_list) {
            if (preg_match('/([0-9.,]+)mm/',$this->list_lineheight[$this->listlvl][$this->listOcc],$am)) { 
                $lhfixed = true; 
                $def_fontsize = $this->InlineProperties['LISTITEM'][$this->listlvl][$this->listOcc][$this->listnum]['size'];
                $this->lineheight_correction = $am[1] / $def_fontsize ;
            }
            else { 
                $this->lineheight_correction = $this->list_lineheight[$this->listlvl][$this->listOcc]; 
            }
        }
        else
/*-- END LISTS --*/
/*-- TABLES --*/
        if ($is_table) {
            if (preg_match('/([0-9.,]+)mm/',$this->table_lineheight,$am)) { 
                $lhfixed = true; 
                $def_fontsize = $this->FontSize;                // needs to be default font-size for block ****
                $this->lineheight_correction = $lineHeight / $def_fontsize ; 
            }
            else { 
                $this->lineheight_correction = $this->table_lineheight; 
            }
        }
        else
/*-- END TABLES --*/
        if (isset($this->blk[$this->blklvl]['line_height']) && $this->blk[$this->blklvl]['line_height']) {
            if (preg_match('/([0-9.,]+)mm/',$this->blk[$this->blklvl]['line_height'],$am)) { 
                $lhfixed = true; 
                $def_fontsize = $this->blk[$this->blklvl]['InlineProperties']['size'];  // needs to be default font-size for block ****
                $this->lineheight_correction = $am[1] / $def_fontsize ;
            }
            else { 
                $this->lineheight_correction = $this->blk[$this->blklvl]['line_height']; 
            }
        } 
        else {
            $this->lineheight_correction = $this->normalLineheight; 
        }

        //  correct lineheight to maximum fontsize
        if ($lhfixed) { $maxlineHeight = $this->lineheight; }
        else { $maxlineHeight = 0; }
        $this->forceExactLineheight = true;
        $maxfontsize = 0;
        // While we're at it, check if contains cursive text
        $checkCursive=false;
        if ($this->biDirectional) {  $checkCursive=true; }  // *RTL*
        foreach ( $content as $k => $chunk )
        {
          $this->restoreFont( $font[ $k ],false );
          if (!isset($this->objectbuffer[$k])) { 
            // Soft Hyphens chr(173)
            if (!$this->usingCoreFont) {
                  $content[$k] = $chunk = str_replace("\xc2\xad",'',$chunk ); 
                if (isset($this->CurrentFont['indic']) && $this->CurrentFont['indic']) {  $checkCursive=true; } // *INDIC*
            }
            else if ($this->FontFamily!='csymbol' && $this->FontFamily!='czapfdingbats') {
                  $content[$k] = $chunk = str_replace(chr(173),'',$chunk );
            }
            // Special case of sub/sup carried over on its own to last line
            if (($this->SUB || $this->SUP) && count($content)==1) { $actfs = $this->FontSize*100/55; } // 55% is font change for sub/sup
            else { $actfs = $this->FontSize; }
            if (!$lhfixed) { $maxlineHeight = max($maxlineHeight,$actfs * $this->lineheight_correction ); }
            if ($lhfixed && ($actfs > $def_fontsize || ($actfs > ($lineHeight * $this->lineheight_correction) && $is_list))) { 
                $this->forceExactLineheight = false; 
            }
            $maxfontsize = max($maxfontsize,$actfs);
          }
        }

        if(isset($font[count($font)-1])) {
            $lastfontreqstyle = $font[count($font)-1]['ReqFontStyle'];
            $lastfontstyle = $font[count($font)-1]['style'];
        }
        else {
            $lastfontreqstyle=null;
            $lastfontstyle=null;
        }
        if ($blockdir == 'ltr' && strpos($lastfontreqstyle,"I") !== false && strpos($lastfontstyle,"I") === false) {    // Artificial italic
            $lastitalic = $this->FontSize*0.15*_MPDFK;
        }
        else { $lastitalic = 0; }


/*-- LISTS --*/
        if ($is_list && is_array($this->bulletarray) && count($this->bulletarray)) {
            $actfs = $this->bulletarray['fontsize'];
            if (!$lhfixed) { $maxlineHeight = max($maxlineHeight,$actfs * $this->lineheight_correction );  }
            if ($lhfixed && $actfs > $def_fontsize) { $this->forceExactLineheight = false; }
            $maxfontsize = max($maxfontsize,$actfs);
        }
/*-- END LISTS --*/

        // when every text item checked i.e. $maxfontsize is set properly

        $af = 0;    // Above font
        $bf = 0;    // Below font
        $mta = 0;   // Maximum top-aligned 
        $mba = 0;   // Maximum bottom-aligned 

        foreach ( $content as $k => $chunk )
        {
          if (isset($this->objectbuffer[$k])) { 
            $oh = $this->objectbuffer[$k]['OUTER-HEIGHT'];
            $va = $this->objectbuffer[$k]['vertical-align']; // = $objattr['vertical-align'] = set as M,T,B,S
            if ($lhfixed && $oh > $def_fontsize) { $this->forceExactLineheight = false; }

            if ($va == 'BS') {  //  (BASELINE default)
                $af = max($af, ($oh - ($maxfontsize * (0.5 + $this->baselineC))));
            }
            else if ($va == 'M') { 
                $af = max($af, ($oh - $maxfontsize)/2);
                $bf = max($bf, ($oh - $maxfontsize)/2);
            }
            else if ($va == 'TT') { 
                $bf = max($bf, ($oh - $maxfontsize));
            }
            else if ($va == 'TB') { 
                $af = max($af, ($oh - $maxfontsize));
            }
            else if ($va == 'T') { 
                $mta = max($mta, $oh);
            }
            else if ($va == 'B') { 
                $mba = max($mba, $oh);
            }
          }
        }
        if ((!$lhfixed || !$this->forceExactLineheight) && ($af > (($maxlineHeight - $maxfontsize)/2) || $bf > (($maxlineHeight - $maxfontsize)/2))) {
            $maxlineHeight = $maxfontsize + $af + $bf;
        }
        else if (!$lhfixed) { $af = $bf = ($maxlineHeight - $maxfontsize)/2; }
        if ($mta > $maxlineHeight) { 
            $bf += ($mta - $maxlineHeight);
            $maxlineHeight = $mta;
        }
        if ($mba > $maxlineHeight) { 
            $af += ($mba - $maxlineHeight);
            $maxlineHeight = $mba;
        }

        $lineHeight = $maxlineHeight;
        // If NOT images, and maxfontsize NOT > lineHeight - this value determines text baseline positioning
        if ($lhfixed && $af==0 && $bf==0 && $maxfontsize<=($def_fontsize * $this->lineheight_correction * 0.8 )) { 
            $this->linemaxfontsize = $def_fontsize; 
        }
        else { $this->linemaxfontsize = $maxfontsize; }

        // Get PAGEBREAK TO TEST for height including the bottom border/padding
        $check_h = max($this->divheight,$lineHeight);

        // This fixes a proven bug...
        if ($endofblock && $newblock && $blockstate==0 && !$content) {  $check_h = 0; }
        // but ? needs to fix potentially more widespread...
    //  if (!$content) {  $check_h = 0; }

        if ($this->blklvl > 0 && !$is_table) { 
           if ($endofblock && $blockstate > 1) { 
            if ($this->blk[$this->blklvl]['page_break_after_avoid']) {  $check_h += $lineHeight; }
            $check_h += ($this->blk[$this->blklvl]['padding_bottom'] + $this->blk[$this->blklvl]['border_bottom']['w']);
           }
           //   mPDF 5.4.03
           if (($newblock && ($blockstate==1 || $blockstate==3) && $lineCount == 0) || ($endofblock && $blockstate ==3 && $lineCount == 0)) { 
            $check_h += ($this->blk[$this->blklvl]['padding_top'] + $this->blk[$this->blklvl]['margin_top'] + $this->blk[$this->blklvl]['border_top']['w']);
           }
        }

        // Force PAGE break if column height cannot take check-height
        if ($this->ColActive && $check_h > ($this->PageBreakTrigger - $this->y0)) { 
            $this->SetCol($this->NbCol-1);
        }
 
        //  mPDF 5.4.04
        // Avoid just border/background-color moved on to next page
        if ($endofblock && $blockstate > 1 && !$content) { $buff = $this->margBuffer; }
        else { $buff = 0; }


        // PAGEBREAK
        // mPDF 5.4.04
        if(!$is_table && ($this->y+$check_h) > ($this->PageBreakTrigger + $buff) and !$this->InFooter and $this->AcceptPageBreak()) {
                $bak_x=$this->x;//Current X position
            // WORD SPACING
            $ws=$this->ws;//Word Spacing
            $charspacing=$this->charspacing;//Character Spacing
            $this->ResetSpacing();

              $this->AddPage($this->CurOrientation);

              $this->x=$bak_x;
            // Added to correct for OddEven Margins
            $currentx += $this->MarginCorrection;
            $this->x += $this->MarginCorrection;

            // WORD SPACING
            $this->SetSpacing($charspacing,$ws);
        }

        if ($this->keep_block_together && !$is_table && $this->kt_p00 < $this->page && ($this->y+$check_h) > $this->kt_y00) {
            $this->printdivbuffer();
            $this->keep_block_together = 0;
        }

/*-- COLUMNS --*/
        // COLS
        // COLUMN CHANGE
        if ($this->CurrCol != $oldcolumn) {
            $currentx += $this->ChangeColumn * ($this->ColWidth+$this->ColGap);
            $this->x += $this->ChangeColumn * ($this->ColWidth+$this->ColGap);
            $oldcolumn = $this->CurrCol;
        }


        if ($this->ColActive && !$is_table) { $this->breakpoints[$this->CurrCol][] = $this->y; }
/*-- END COLUMNS --*/

        // TOP MARGIN
        if ($newblock && ($blockstate==1 || $blockstate==3) && ($this->blk[$this->blklvl]['margin_top']) && $lineCount == 0 && !$is_table && !$is_list) { 
            $this->DivLn($this->blk[$this->blklvl]['margin_top'],$this->blklvl-1,true,$this->blk[$this->blklvl]['margin_collapse']); 
            if ($this->ColActive) { $this->breakpoints[$this->CurrCol][] = $this->y; }  // *COLUMNS*
        }

        if ($newblock && ($blockstate==1 || $blockstate==3) && $lineCount == 0 && !$is_table && !$is_list) { 
            $this->blk[$this->blklvl]['y0'] = $this->y;
            $this->blk[$this->blklvl]['startpage'] = $this->page;
            if ($this->blk[$this->blklvl]['float']) { $this->blk[$this->blklvl]['float_start_y'] = $this->y; } // mPDF 5.6.63
            if ($this->ColActive) { $this->breakpoints[$this->CurrCol][] = $this->y; }  // *COLUMNS*
        }

    // ADDED for Paragraph_indent
    $WidthCorrection = 0;
    if (($newblock) && ($blockstate==1 || $blockstate==3) && isset($this->blk[$this->blklvl]['text_indent']) && ($lineCount == 0) && (!$is_table) && (!$is_list) && ($align != 'C')) { 
        $ti = $this->ConvertSize($this->blk[$this->blklvl]['text_indent'],$this->blk[$this->blklvl]['inner_width'],$this->FontSize,false); 
        $WidthCorrection = ($ti*_MPDFK); 
    } 


    // PADDING and BORDER spacing/fill
    if (($newblock) && ($blockstate==1 || $blockstate==3) && (($this->blk[$this->blklvl]['padding_top']) || ($this->blk[$this->blklvl]['border_top'])) && ($lineCount == 0) && (!$is_table) && (!$is_list)) { 
            // $state = 0 normal; 1 top; 2 bottom; 3 top and bottom
            $this->DivLn($this->blk[$this->blklvl]['padding_top'] + $this->blk[$this->blklvl]['border_top']['w'],-3,true,false,1); 
            if ($this->ColActive) { $this->breakpoints[$this->CurrCol][] = $this->y; }  // *COLUMNS*
            $this->x = $currentx;
    }


    // Added mPDF 3.0 Float DIV
    $fpaddingR = 0;
    $fpaddingL = 0;
/*-- CSS-FLOAT --*/
    if (count($this->floatDivs)) {
        list($l_exists, $r_exists, $l_max, $r_max, $l_width, $r_width) = $this->GetFloatDivInfo($this->blklvl);
        if ($r_exists) { $fpaddingR = $r_width; }
        if ($l_exists) { $fpaddingL = $l_width; }
    }
/*-- END CSS-FLOAT --*/

    $usey = $this->y + 0.002;
    if (($newblock) && ($blockstate==1 || $blockstate==3) && ($lineCount == 0) ) { 
        $usey += $this->blk[$this->blklvl]['margin_top'] + $this->blk[$this->blklvl]['padding_top'] + $this->blk[$this->blklvl]['border_top']['w'];
    }
/*-- CSS-IMAGE-FLOAT --*/
    // If float exists at this level
    if (isset($this->floatmargins['R']) && $usey <= $this->floatmargins['R']['y1'] && $usey >= $this->floatmargins['R']['y0'] && !$this->floatmargins['R']['skipline']) { $fpaddingR += $this->floatmargins['R']['w']; }
    if (isset($this->floatmargins['L']) && $usey <= $this->floatmargins['L']['y1'] && $usey >= $this->floatmargins['L']['y0'] && !$this->floatmargins['L']['skipline']) { $fpaddingL += $this->floatmargins['L']['w']; }
/*-- END CSS-IMAGE-FLOAT --*/

    if ($content) {

        // In FinishFlowing Block no lines are justified as it is always last line
        // but if CJKorphan has allowed content width to go over max width, use J charspacing to compress line
        // JUSTIFICATION J - NOT!
        $nb_carac = 0;
        $nb_spaces = 0;
        $jcharspacing = 0;
        $jws = 0;
        $inclCursive=false;
        $dottab = false; // mPDF 5.6.19
        foreach ( $content as $k => $chunk ) {
            if (!isset($this->objectbuffer[$k]) || (isset($this->objectbuffer[$k]) && !$this->objectbuffer[$k])) {
                if ($this->usingCoreFont) {
                      $chunk = str_replace(chr(160),chr(32),$chunk );
                }
                else {
                      $chunk = str_replace(chr(194).chr(160),chr(32),$chunk ); 
                }
                $nb_carac += mb_strlen( $chunk, $this->mb_enc );  
                $nb_spaces += mb_substr_count( $chunk,' ', $this->mb_enc );  
                if ($checkCursive) {
                    if (preg_match("/([".$this->pregRTLchars."])/u", $chunk)) { $inclCursive = true; }  // *RTL*
                    if (preg_match("/([".$this->pregHIchars.$this->pregBNchars.$this->pregPAchars."])/u", $chunk)) { $inclCursive = true; } // *INDIC*
                }
            }
            else if ($this->objectbuffer[$k]['type']=='dottab') { $dottab = $this->objectbuffer[$k]['outdent']; } // mPDF 5.6.19
 %