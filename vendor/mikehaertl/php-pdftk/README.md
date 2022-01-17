php-pdftk
=========

[![GitHub Tests](https://github.com/mikehaertl/php-pdftk/workflows/Tests/badge.svg)](https://github.com/mikehaertl/php-pdftk/actions)
[![Packagist Version](https://img.shields.io/packagist/v/mikehaertl/php-pdftk?label=version)](https://packagist.org/packages/mikehaertl/php-pdftk)
[![Packagist Downloads](https://img.shields.io/packagist/dt/mikehaertl/php-pdftk)](https://packagist.org/packages/mikehaertl/php-pdftk)
[![GitHub license](https://img.shields.io/github/license/mikehaertl/php-pdftk)](https://github.com/mikehaertl/php-pdftk/blob/master/LICENSE)
[![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/mikehaertl/php-pdftk)](https://packagist.org/packages/mikehaertl/php-pdftk)

A PDF conversion and form utility based on pdftk.

## Features

*php-pdftk* brings the full power of `pdftk` to PHP - and more.

 * Fill forms, either from a XFDF/FDF file or from a data array (UTF-8 safe for unflattened forms, requires pdftk 2.x !)
 * Create XFDF or FDF files from PHP arrays (UTF-8 safe!)
 * Create FDF files from filled PDF forms
 * Combine pages from several PDF files into a new PDF file
 * Split a PDF into one file per page
 * Add background or overlay PDFs
 * Read out meta data about PDF and form fields
 * Set passwords and permissions
 * Remove passwords

## Requirements

 * The `pdftk` command must be installed and working on your system
 * This library is written for pdftk 2.x versions. You should be able to use it with pdftk 1.x but not all methods will work there.
   For details consult the man page of pdftk on your system.
 * There is a [known issue](https://github.com/mikehaertl/php-pdftk/issues/150)
   on Ubuntu if you installed the `pdftk` package from snap. This version has
   no permission to write to the `/tmp` directory. You can either set another
   temporay directory as described below or use another package.  For Ubuntu
   18.10 there's also a `pdftk-java` package available via apt which should work
   fine. You can also install this package on Ubuntu 18.04 if you download it
   manually. Also check [this answer](https://askubuntu.com/a/1028983/175814)
   on askubuntu.

> **Note:** The pdftk version from the alternative PPA `ppa:malteworld/ppa` is
> no longer available. The author instead now points to his answer on askubuntu
> linked above.

## Installation

You should use [composer](https://getcomposer.org/) to install this library.

```
composer require mikehaertl/php-pdftk
```

## Examples

### Create instance for PDF files

There are several ways to tell the `Pdf` instance which file(s) it should use.
Some files may also require a password or need an alias to be used as a handle
in some operations (e.g. cat or shuffle).

> **Note:** In version 2.x of pdftk a handle can be one or more upper case letters.

```php
// Create an instance for a single file
$pdf = new Pdf('/path/to/form.pdf');

// Alternatively add files later. Handles are autogenerated in this case.
$pdf = new Pdf();
$pdf->addFile('/path/to/file1.pdf');
$pdf->addFile('/path/to/file2.pdf');

// Add files with own handle
$pdf = new Pdf();
$pdf->addFile('/path/to/file1.pdf', 'A');
$pdf->addFile('/path/to/file2.pdf', 'B');
// Add file with handle and password
$pdf->addFile('/path/to/file3.pdf', 'C', 'secret*password');

// Shortcut to pass all files to the constructor
$pdf = new Pdf([
  'A' => ['/path/to/file1.pdf', 'secret*password1'],
  'B' => ['/path/to/file2.pdf', 'secret*password2'],
]);
```

### Operations

Please consult the `pdftk` man page for each operation to find out how each operation works
in detail and which options are available.

For all operations you can either save the PDF locally through `saveAs($name)` or send it to the
browser with `send()`. If you pass a filename to `send($name)` the client browser will open a download
dialogue whereas without a filename it will usually display the PDF inline.

**IMPORTANT: You can always only perform *one* of the following operations on a single PDF instance.
Below you can find a workaround if you need multiple operations.**

#### Fill Form

Fill a PDF form with data from a PHP array or an XFDF/FDF file.

```php
use mikehaertl\pdftk\Pdf;

// Fill form with data array
$pdf = new Pdf('/full/path/to/form.pdf');
$result = $pdf->fillForm([
        'name'=>'ÄÜÖ äüö мирано čárka',
        'nested.name' => 'valX',
    ])
    ->needAppearances()
    ->saveAs('filled.pdf');

// Always check for errors
if ($result === false) {
    $error = $pdf->getError();
}

// Fill form from FDF
$pdf = new Pdf('form.pdf');
$result = $pdf->fillForm('data.xfdf')
    ->saveAs('filled.pdf');
if ($result === false) {
    $error = $pdf->getError();
}
```

**Note:** When filling in UTF-8 data, you should always add the `needAppearances()` option.
This will make sure, that the PDF reader takes care of using the right fonts for rendering,
something that pdftk can't do for you. Also note that `flatten()` doesn't really work well
if you have special characters in your data.

#### Create a XFDF/FDF file from a PHP array

This is a bonus feature that is not available from `pdftk`.

```php
use mikehaertl\pdftk\XfdfFile;
use mikehaertl\pdftk\FdfFile;

$xfdf = new XfdfFile(['name' => 'Jürgen мирано']);
$xfdf->saveAs('/path/to/data.xfdf');

$fdf = new FdfFile(['name' => 'Jürgen мирано']);
$fdf->saveAs('/path/to/data.fdf');
```

#### Cat

Assemble a PDF from pages from one or more PDF files.

```php
use mikehaertl\pdftk\Pdf;

// Extract pages 1-5 and 7,4,9 into a new file
$pdf = new Pdf('/path/to/my.pdf');
$result = $pdf->cat(1, 5)
    ->cat([7, 4, 9])
    ->saveAs('/path/to/new.pdf');
if ($result === false) {
    $error = $pdf->getError();
}

// Combine pages from several files
$pdf = new Pdf([
    'A' => '/path/file1.pdf',                 // A is alias for file1.pdf
    'B' => ['/path/file2.pdf','pass**word'],  // B is alias for file2.pdf
    'C' => ['/path/file3.pdf','secret**pw'],  // C is alias for file3.pdf
]);
$result = $pdf->cat(1, 5, 'A')                // pages 1-5 from A
    ->cat(3, null, 'B')             // page 3 from B
    ->cat(7, 'end', 'B', null, 'east') // pages 7-end from B, rotated East
    ->cat('end',3,'A','even')       // even pages 3-end in reverse order from A
    ->cat([2,3,7], 'C')             // pages 2,3 and 7 from C
    ->saveAs('/path/new.pdf');
if ($result === false) {
    $error = $pdf->getError();
}
```

#### Shuffle

Like `cat()` but create "*streams*" and fill the new PDF with one page from each
stream at a time.

```php
use mikehaertl\pdftk\Pdf;

$pdf = new Pdf([
    'A' => '/path/file1.pdf',     // A is alias for file1.pdf
    'B' => '/path/file2.pdf',     // B is alias for file2.pdf
]);

// new.pdf will have pages A1, B3, A2, B4, A3, B5, ...
$result = $pdf->shuffle(1, 5, 'A')    // pages 1-5 from A
    ->shuffle(3, 8, 'B')    // pages 3-8 from B
    ->saveAs('/path/new.pdf');
if ($result === false) {
    $error = $pdf->getError();
}
```

#### Burst

Split a PDF file into one file per page.

```php
use mikehaertl\pdftk\Pdf;

$pdf = new Pdf('/path/my.pdf');
$result = $pdf->burst('/path/page_%d.pdf');     // Supply a printf() pattern
if ($result === false) {
    $error = $pdf->getError();
}
```

#### Add background PDF

Add another PDF file as background.

```php
use mikehaertl\pdftk\Pdf;

// Set background from another PDF (first page repeated)
$pdf = new Pdf('/path/my.pdf');
$result = $pdf->background('/path/back.pdf')
    ->saveAs('/path/watermarked.pdf');
if ($result === false) {
    $error = $pdf->getError();
}

// Set background from another PDF (one page each)
$pdf = new Pdf('/path/my.pdf');
$result = $pdf->multiBackground('/path/back_pages.pdf')
    ->saveAs('/path/watermarked.pdf');
if ($result === false) {
    $error = $pdf->getError();
}
```

#### Add overlay PDF

Add another PDF file as overlay.

```php
use mikehaertl\pdftk\Pdf;

// Stamp with another PDF (first page repeated)
$pdf = new Pdf('/path/my.pdf');
$result = $pdf->stamp('/path/overlay.pdf')
    ->saveAs('/path/stamped.pdf');
if ($result === false) {
    $error = $pdf->getError();
}

// Stamp with another PDF (one page each)
$pdf = new Pdf('/path/my.pdf');
$result = $pdf->multiStamp('/path/overlay_pages.pdf')
    ->saveAs('/path/stamped.pdf');
if ($result === false) {
    $error = $pdf->getError();
}
```

#### Attach Files

Add file attachments to the document or to a specific page.

```php
use mikehaertl\pdftk\Pdf;

$files = [
    '/path/to/file1',
    '/path/to/file2',
]

// Add files at the document level
$pdf = new Pdf('/path/my.pdf');
$result = $pdf->attachFiles($files)
    ->saveAs('/path/withfiles.pdf');
if ($result === false) {
    $error = $pdf->getError();
}

// Add files to a specific page
$pdf = new Pdf('/path/my.pdf');
$page = 7;
$result = $pdf->attachFiles($files, $page)
    ->saveAs('/path/withfiles.pdf');
if ($result === false) {
    $error = $pdf->getError();
}
```
#### Unpack Files

Copy file attachments from a PDF to the given directory.

```php
use mikehaertl\pdftk\Pdf;

$pdf = new Pdf('/path/my.pdf');
$result = $pdf->unpackFiles('/path/to/dir');
if ($result === false) {
    $error = $pdf->getError();
}
```

#### Generate FDF

Create a FDF file from a given filled PDF form.

```php
use mikehaertl\pdftk\Pdf;

// Create FDF from PDF
$pdf = new Pdf('/path/form.pdf');
$result = $pdf->generateFdfFile('/path/data.fdf');
if ($result === false) {
    $error = $pdf->getError();
}
```

#### Get PDF data

Read out metadata or form field information from a PDF file.

```php
use mikehaertl\pdftk\Pdf;

// Get data
$pdf = new Pdf('/path/my.pdf');
$data = $pdf->getData();
if ($data === false) {
    $error = $pdf->getError();
}

// Get form data fields
$pdf = new Pdf('/path/my.pdf');
$data = $pdf->getDataFields();
if ($data === false) {
    $error = $pdf->getError();
}

// Get data as string
echo $data;
$txt = (string) $data;
$txt = $data->__toString();

// Get data as array
$arr = (array) $data;
$arr = $data->__toArray();
$field1 = $data[0]['Field1'];
```

#### How to perform more than one operation on a PDF

As stated above, you can only perform one of the preceeding operations on a single PDF instance.
If you need more than one operation you can feed one `Pdf` instance into another:

```php
use mikehaertl\pdftk\Pdf;

// Extract pages 1-5 and 7,4,9 into a new file
$pdf = new Pdf('/path/my.pdf');
$pdf->cat(1, 5)
    ->cat([7, 4, 9]);

// We now use the above PDF as source file for a new PDF
$pdf2 = new Pdf($pdf);
$result = $pdf2->fillForm(['name' => 'ÄÜÖ äüö мирано čárka'])
    ->needAppearances()
    ->saveAs('/path/filled.pdf');
if ($result === false) {
    $error = $pdf->getError();
}
```

### Options

You can combine the above operations with one or more of the following options.

```php
use mikehaertl\pdftk\Pdf;

$pdf = new Pdf('/path/my.pdf');

$result = $pdf->allow('AllFeatures')      // Change permissions
    ->flatten()                 // Merge form data into document (doesn't work well with UTF-8!)
    ->compress($value)          // Compress/Uncompress
    ->keepId('first')           // Keep first/last Id of combined files
    ->dropXfa()                 // Drop newer XFA form from PDF
    ->dropXmp()                 // Drop newer XMP data from PDF
    ->needAppearances()         // Make clients create appearance for form fields
    ->setPassword($pw)          // Set owner password
    ->setUserPassword($pw)      // Set user password
    ->passwordEncryption(128)   // Set password encryption strength
    ->saveAs('new.pdf');
if ($result === false) {
    $error = $pdf->getError();
}

// Example: Fill PDF form and merge form data into PDF
// Fill form with data array
$result = $pdf = new Pdf('/path/form.pdf');
$pdf->fillForm(['name' => 'My Name'])
    ->flatten()
    ->saveAs('/path/filled.pdf');
if ($result === false) {
    $error = $pdf->getError();
}

// Example: Remove password from a PDF
$pdf = new Pdf;
$result = $pdf->addFile('/path/my.pdf', null, 'some**password')
    ->saveAs('/path/new.pdf');
if ($result === false) {
    $error = $pdf->getError();
}
```

### Shell Command

The class uses [php-shellcommand](https://github.com/mikehaertl/php-shellcommand) to execute
`pdftk`. You can pass `$options` for its `Command` class as second argument to the constructor:

```php
use mikehaertl\pdftk\Pdf;

$pdf = new Pdf('/path/my.pdf', [
    'command' => '/some/other/path/to/pdftk',
    // or on most Windows systems:
    // 'command' => 'C:\Program Files (x86)\PDFtk\bin\pdftk.exe',
    'useExec' => true,  // May help on Windows systems if execution fails
]);
```

### Temporary File

Internally a temporary file is created via [php-tmpfile](https://github.com/mikehaertl/php-tmpfile).
You can also access that file directly, e.g. if you neither want to send or save the
file but only need the binary PDF content:

```php
use mikehaertl\pdftk\Pdf;

$pdf = new Pdf('/path/my.pdf');
$result = $pdf->fillForm(['name' => 'My Name'])
    ->execute();
if ($result === false) {
    $error = $pdf->getError();
}
$content = file_get_contents( (string) $pdf->getTmpFile() );
```

If you have permission issues you may have to set a directory where your
`pdftk` command can write to:

```php
use mikehaertl\pdftk\Pdf;

$pdf = new Pdf('/path/my.pdf');
$pdf->tempDir = '/home/john/temp';
```

## API

Please consult the source files for a full documentation of each method.