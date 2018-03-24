<?php

interface RenderTemplateInterface
{
  public function renderHeader();
  public function renderBody();
  public function renderFooter();
}

class RenderHTMLTemplate implements RenderTemplateInterface
{

  public function renderHeader()
  {
    return "<html><body>";
  }

  public function renderBody()
  {
    return "Hello World";
  }

  public function renderFooter()
  {
    return "</body></html>";
  }

}

/**
 * Separate interface just for rendering PDF's
 * Having a separate interface from RenderTemplateInterface could be a requirement from a third party
 */
interface PDFTemplateInterface
{
  public function renderTop();
  public function renderMiddle();
  public function renderBottom();
}

class RenderPDFTemplate implements PDFTemplateInterface
{

  public function renderTop()
  {
    return "This is the top of the PDF";
  }

  public function renderMiddle()
  {
    return "Hello World";
  }

  public function renderBottom()
  {
    return "This is the bottom of the PDF";
  }

}

/**
 * The adapter - this will encapsulate an instance of the RenderPDFTemplate class
 * to work polymorphically with the RenderTemplateInterface interface
 */
class PDFTemplateAdapter implements RenderTemplateInterface
{
  private $pdfTemplate;

  public function __construct(PDFTemplateInterface $pdfTemplate)
  {
    $this->pdfTemplate = $pdfTemplate;
  }

  public function renderHeader()
  {
    return $this->pdfTemplate->renderTop();
  }

  public function renderBody()
  {
    return $this->pdfTemplate->renderMiddle();
  }

  public function renderFooter()
  {
    return $this->pdfTemplate->renderBottom();
  }
}

$pdfTemplate = new RenderPDFTemplate();

// $pdfTemplateAdapter will implement RenderTemplateInterface, just like RenderHTMLTemplate does
$pdfTemplateAdapter = new PDFTemplateAdapter($pdfTemplate);

// This is the top of the PDF
echo $pdfTemplateAdapter->renderHeader();
echo '</br>';

echo 'This is pdf body: ';
echo $pdfTemplateAdapter->renderBody();
echo '</br>';

echo $pdfTemplateAdapter->renderFooter();
echo '</br>';

$htmlTemplate = new RenderHTMLTemplate();

// This is the body of the HTML
echo 'This is html body: ';
echo $htmlTemplate->renderBody();
echo '</br>';


?>
