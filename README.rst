autoconst
=========

.. contents::
   :local:

Description
-----------

Autoload PHP constants via Composer.

Installation
------------

.. code-block:: sh

    composer require nickolasburr/autoconst:^1.0

Usage
-----

Constants are defined via :code:`extra.define` object:

.. code-block:: json

   {
     "autoload": {
       "psr-4": {
         "Vendor\\Package": "src/"
       }
     },
     "extra": {
       "define": {
         "MODULE": "Vendor_Package"
       }
     }
   }

The above can be treated the same as if it was defined
via :code:`const`:

.. code-block:: php

   <?php

   namespace Vendor\Package;

   const MODULE = 'Vendor_Package';
