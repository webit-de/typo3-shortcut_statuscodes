========================================
Different HTTP statuscodes for shortcuts
========================================

:Extension name: Different HTTP statuscodes for shortcuts
:Extension key: shortcut_statuscodes
:Version: 0.1.0
:Description: Restore the old statuscodes for redirects
:Language: en
:Author: Dan Untenzu
:Creation: 2013-12-18
:Keywords: shortcut, statuscode, redirect, forwarding, 301
:Licence: Open Content License available from `www.opencontent.org/opl.shtml <http://www.opencontent.org/opl.shtml>`_

EXT: Different HTTP statuscodes for shortcuts
=============================================

Extension Key: shortcut_statuscodes

Author: Dan Untenzu <untenzu@webit.de> for webit! Gesellschaft für
neue Medien mbH (http://www.webit.de/)

This document is published under the Open Content License, available
from `www.opencontent.org/opl.shtml <http://www.opencontent.org/opl.shtml>`_.

The content of this document is related to TYPO3, a GNU/GPL
CMS/Framework available from `www.typo3.org <http://www.typo3.org/>`_.

The extension is published under the GNU General Public License
version 2, available from `www.gnu.org/copyleft/gpl.html
<http://www.gnu.org/copyleft/gpl.html>`_

**Table of Contents**

.. toctree::
   :maxdepth: 5
   :titlesonly:
   :glob:

Introduction
------------

What does it do?
^^^^^^^^^^^^^^^^

This TYPO3 CMS frontend extension restores the use of different HTTP statuscodes
for redirects depending on the type of the selected shortcut for a page.

- 307 for redirects to rather random pages
  (first subpage, random subpage, parent page)
- 301 for redirects to a well-defined page
  (explicitly selected page)

Motivation & Usage
^^^^^^^^^^^^^^^^^^

This extension is made due to the discussion in `TYPO3 issue 73148 <https://forge.typo3.org/issues/73148>`_

Please take a look into the ticket to understand why the TYPO3 core team did not want
this functionality to be part of the core anymore.

The extension overwrites a method in the core! Keep this in mind for core updates and other
installed extension which may try to override the same class.

As described above this is a patch extension only. If you want to let your editors manage shortcuts
to your own needs, then you should take a look into the following great extensions:

- »URL Forwarding« by Patrick Broens (`EXT:url_forwarding <https://typo3.org/extensions/repository/view/url_forwarding>`_)
- »My Redirects« by Benjamin Serfhos (`EXT:my_redirects <https://typo3.org/extensions/repository/view/my_redirects>`_)

Configuration
-------------

- Grab this extension from TER and install it

- The extension won't install any tables or any additional fields

Reference
^^^^^^^^^

- None

Known problems
--------------

- None

Please do not hesitate to contact me if you find any bugs or even
better yet, send a pull request on GitHub.

.. tip::
	Issue tracker: https://github.com/webit-de/typo3-shortcut_statuscodes/issues

To-Do list
----------

- None

Please do not hesitate to contact me if you have a wishlist or usefull
patches.

.. tip::
	Issue tracker: https://github.com/webit-de/typo3-shortcut_statuscodes/issues

Changelog
---------

- https://github.com/webit-de/typo3-shortcut_statuscodes/blob/master/Changelog.md

Contribution
------------

	TYPO3 - inspiring people to share!

This TYPO3 extension is Open Source, so please use, patch, extend or fork it.

- https://github.com/webit-de/typo3-shortcut_statuscodes/
