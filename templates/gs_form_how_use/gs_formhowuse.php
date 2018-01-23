<?php if ( ! defined( 'ABSPATH' ) ) exit ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
	<META HTTP-EQUIV="CONTENT-TYPE" CONTENT="text/html; charset=utf-8">
	<TITLE></TITLE>
	<META NAME="GENERATOR" CONTENT="LibreOffice 4.1.6.2 (Linux)">
	<META NAME="CREATED" CONTENT="0;0">
	<META NAME="CHANGED" CONTENT="0;0">
	<STYLE TYPE="text/css">
	<!--
		@page { margin: 1in }
		P { margin-bottom: 0.08in }
		A:link { so-language: zxx }
	-->
	</STYLE>
</HEAD>
<BODY LANG="en-US" DIR="LTR">
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">Shortcodes:</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>GS_FORM_1 - </B>causes
a static form that mimics the search</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">	headline - form header
(default.: Finde den besten Anwalt für Arbeitsrecht in Deiner Nähe)</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">	subline - form subtitle
(default.:Schnell, kostenlos &amp; unverbindlich.)</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P ALIGN=CENTER STYLE="margin-bottom: 0in"><IMG SRC="<?= plugins_url( 'gs_formhowuse_1__html_f33edcc8.png', __FILE__ ) ?>" NAME="image5.png" ALIGN=BOTTOM HSPACE=12 VSPACE=12 WIDTH=542 HEIGHT=379 BORDER=0></P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">	In the plugin settings,
you can specify the simulation time and percentage of the values to
be learned.</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><IMG SRC="<?= plugins_url( 'gs_formhowuse_1__html_3c87ec1c.png', __FILE__ ) ?>" NAME="image7.png" ALIGN=BOTTOM HSPACE=12 VSPACE=12 WIDTH=602 HEIGHT=309 BORDER=0></P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>GS_FORM_2 - </B>causes
a static three-step shape 
</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">	headline - form header
(default.: Finde den besten Anwalt für Arbeitsrecht in Deiner Nähe)</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">	subline -  form subtitle
(default.:Schnell, kostenlos &amp; unverbindlich.)</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">	step_name - A string
containing the names of steps separated by a comma (default. Fall
beschreiben,Daten eingeben,FragRobin hilft)</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P ALIGN=CENTER STYLE="margin-bottom: 0in"><IMG SRC="<?= plugins_url( 'gs_formhowuse_1__html_af626692.png', __FILE__ ) ?>" NAME="image12.png" ALIGN=BOTTOM HSPACE=12 VSPACE=12 WIDTH=602 HEIGHT=515 BORDER=0></P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>GS_FORM_3 - </B>Calls
up a dynamic questionnaire by ID. You can create a questionnaire in
the admin panel “GS Form -&gt; Add new form”. View all forms and
their shortcodes along the way “GS Form -&gt; Forms list”.</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">	form_id (required
parameter) - form identifier</P>
<P ALIGN=CENTER STYLE="margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><B>GS_FORM_SECTION -
</B>displays the section of the questionnaire, used in dynamic forms.</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">	<B>question </B>-
question 
</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">	<B>subtitle </B>-
question subtitle 
</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">	<B>answears </B>-
depends on the parameter<B> type</B></P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">	<B>type </B>- question
type</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in">	<B>button </B>- button
label</P>
<P ALIGN=JUSTIFY STYLE="margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="text-indent: 0.5in; margin-bottom: 0in"><U><B>type:</B></U></P>
<P ALIGN=JUSTIFY STYLE="text-indent: 0.5in; margin-bottom: 0in"><U><B>	Anceta
- </B></U>questionnaire with an arbitrary number of answers</P>
<P ALIGN=CENTER STYLE="text-indent: 0.5in; margin-bottom: 0in"><IMG SRC="<?= plugins_url( 'gs_formhowuse_1__html_16744e90.png', __FILE__ ) ?>" NAME="image9.png" ALIGN=BOTTOM HSPACE=12 VSPACE=12 WIDTH=544 HEIGHT=328 BORDER=0></P>
<P ALIGN=JUSTIFY STYLE="text-indent: 0.5in; margin-bottom: 0in"><U><B>	Text
- </B></U>text field with placeholder</P>
<P ALIGN=CENTER STYLE="text-indent: 0.5in; margin-bottom: 0in"><IMG SRC="<?= plugins_url( 'gs_formhowuse_1__html_ba78168e.png', __FILE__ ) ?>" NAME="image8.png" ALIGN=BOTTOM HSPACE=12 VSPACE=12 WIDTH=535 HEIGHT=255 BORDER=0></P>
<P ALIGN=JUSTIFY STYLE="text-indent: 0.5in; margin-bottom: 0in"><U><B>	Select
- </B></U>drop-down list</P>
<P ALIGN=CENTER STYLE="text-indent: 0.5in; margin-bottom: 0in"><IMG SRC="<?= plugins_url( 'gs_formhowuse_1__html_f59c0924.png', __FILE__ ) ?>" NAME="image11.png" ALIGN=BOTTOM HSPACE=12 VSPACE=12 WIDTH=427 HEIGHT=203 BORDER=0></P>
<P ALIGN=CENTER STYLE="text-indent: 0.5in; margin-bottom: 0in"><BR>
</P>
<P ALIGN=JUSTIFY STYLE="text-indent: 0.5in; margin-bottom: 0in"><B>Guidelines
for creating new dynamic forms: </B><A HREF="http://ior.ad/hX5"><FONT COLOR="#1155cc"><U><B>Guidelines
</B></U></FONT></A>
</P>
</BODY>
</HTML>