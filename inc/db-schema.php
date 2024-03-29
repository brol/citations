<?php
/**
 * @brief Citations, a plugin for Dotclear 2
 *
 * @package Dotclear
 * @subpackage Plugins
 *
 * @author Olivier Le Bris, Pierre Van Glabeke and contributors
 *
 * @copyright http://creativecommons.org/licenses/by-nc-sa/2.0/fr/
 */
if (!($_s instanceof dbStruct)) { throw new Exception('No valid schema object'); }

// ====================================================================================================
// tables
// ====================================================================================================

// newsletter
$_s->citations
    ->citation_id('integer', 0, TRUE)
    ->blog_id('varchar', 32, FALSE)
    ->author('varchar', 255, FALSE)
    ->content('text', 0, FALSE)

	->primary			('pk_citations', 'blog_id', 'citation_id')
	->unique			('uk_citations', 'citation_id', 'blog_id')
	;


// ====================================================================================================
// index de référence
// ====================================================================================================


// ====================================================================================================
// index de performance
// ====================================================================================================

$_s->citations->index	('idx_citations_blog_id', 'btree', 'blog_id');


// ====================================================================================================
// clées étrangères
// ====================================================================================================

$_s->citations->reference	('fk_citations_blog', 'blog_id', 'blog', 'blog_id', 'cascade', 'cascade');

