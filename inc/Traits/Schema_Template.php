<?php
/**
 * Handles schema template generation
 *
 * @package Tutor_Starter
 */

namespace Tutor_Starter\Traits;

defined( 'ABSPATH' ) || exit;

/**
 * Schema template trait
 */
trait Schema_Template {

	/**
	 * Web page
	 *
	 * @param string schema type.
	 *
	 * @return array schema
	 */
	public static function web_page( $schema_type ) {
		// Get the relevant meta.
		$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );

		if ( ! empty( $post_meta ) && 'WebPage' === $schema_type ) {
			$schema = array(
				'@context' => 'http://schema.org',
				'@type'    => 'WebPage',
			);

			if ( ! empty( $post_meta['name'] ) ) {
				$schema['name'] = $post_meta['name'];
			}

			if ( ! empty( $post_meta['description'] ) ) {
				$schema['description'] = $post_meta['description'];
			}
		}

		return $schema;
	}

	/**
	 * Course
	 *
	 * @param string schema type.
	 *
	 * @return array schema
	 */
	public static function course( $schema_type ) {
		// Get the relevant meta.
		$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );

		if ( ! empty( $post_meta ) && 'Course' === $schema_type ) {
			$schema = array(
				'@context' => 'http://schema.org',
				'@type'    => 'Course',
			);

			if ( ! empty( $post_meta['name'] ) ) {
				$schema['name'] = $post_meta['name'];
			}

			if ( ! empty( $post_meta['description'] ) ) {
				$schema['description'] = $post_meta['description'];
			}

			if ( ! empty( $post_meta['provider_name'] ) ) {
				$schema['provider']          = array();
				$schema['provider']['@type'] = 'Organization';
				$schema['provider']['name']  = $post_meta['provider_name'];
			}
		}

		return $schema;
	}

	/**
	 * Blog post
	 *
	 * @return array schema
	 */
	public static function blog_post() {
		// Get the relevant meta.
		$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );

		if ( ! empty( $post_meta ) ) {
			$schema = array(
				'@context' => 'http://schema.org',
				'@type'    => 'BlogPosting',
			);

			if ( ! empty( $post_meta['name'] ) ) {
				$schema['headline'] = $post_meta['name'];
			} else {
				$schema['headline'] = get_the_title( get_the_ID() );
			}

			if ( ! empty( $post_meta['logo_url'] ) ) {
				$schema['image'] = $post_meta['logo_url'];
			} else {
				if ( false !== get_the_post_thumbnail_url( get_the_ID() ) ) {
					$schema['image'] = get_the_post_thumbnail_url( get_the_ID() );
				}
			}

			if ( ! empty( $post_meta['keywords'] ) ) {
				$schema['keywords'] = $post_meta['keywords'];
			}

			$schema['datePublished'] = get_the_date( 'Y-m-d', get_the_ID() );
			$schema['dateModified']  = get_the_modified_date( 'Y-m-d', get_the_ID() );

			if ( ! empty( $post_meta['description'] ) ) {
				$schema['description'] = $post_meta['description'];
			} else {
				$schema['description'] = get_the_excerpt( get_the_ID() );
			}

			if ( ! empty( $post_meta['article_body'] ) ) {
				$schema['articleBody'] = $post_meta['article_body'];
			} else {
				$schema['articleBody'] = wp_strip_all_tags( get_the_content( get_the_ID() ) );
			}
		} else {
			$schema = array(
				'@context' => 'http://schema.org',
				'@type'    => 'BlogPosting',
			);

			$schema['headline'] = get_the_title( get_the_ID() );

			if ( false !== get_the_post_thumbnail_url( get_the_ID() ) ) {
				$schema['image'] = get_the_post_thumbnail_url( get_the_ID() );
			}

			$schema['datePublished'] = get_the_date( 'Y-m-d', get_the_ID() );
			$schema['dateModified']  = get_the_modified_date( 'Y-m-d', get_the_ID() );

			$schema['description'] = get_the_excerpt( get_the_ID() );

			$schema['articleBody'] = wp_strip_all_tags( get_the_content( get_the_ID() ) );
		}

		return $schema;
	}

	/**
	 * Video
	 *
	 * @param string schema type.
	 *
	 * @return array schema
	 */
	public static function video( $schema_type ) {
		// Get the relevant meta.
		$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );

		if ( ! empty( $post_meta ) && 'Video' === $schema_type ) {
			$schema = array(
				'@context' => 'http://schema.org',
				'@type'    => 'VideoObject',
			);

			if ( ! empty( $post_meta['name'] ) ) {
				$schema['name'] = $post_meta['name'];
			}

			if ( ! empty( $post_meta['description'] ) ) {
				$schema['description'] = $post_meta['description'];
			}

			if ( ! empty( $post_meta['logo_url'] ) ) {
				$schema['thumbnailUrl'] = $post_meta['logo_url'];
			}

			if ( ! empty( $post_meta['upload_date'] ) ) {
				$schema['uploadDate'] = $post_meta['upload_date'];
			}

			if ( ! empty( $post_meta['duration'] ) ) {
				$schema['duration'] = $post_meta['duration'];
			}

			if ( ! empty( $post_meta['content_url'] ) ) {
				$schema['contentUrl'] = $post_meta['content_url'];
			}

			if ( ! empty( $post_meta['embed_url'] ) ) {
				$schema['embedUrl'] = $post_meta['embed_url'];
			}

			if ( ! empty( $post_meta['interaction_count'] ) ) {
				$schema['interactionCount'] = $post_meta['interaction_count'];
			}
		}

		return $schema;
	}

	/**
	 * Review
	 *
	 * @param string schema type.
	 *
	 * @return array schema
	 */
	public static function review( $schema_type ) {
		// Get the relevant meta.
		$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );

		if ( ! empty( $post_meta ) && 'Review' === $schema_type ) {
			$schema = array(
				'@context' => 'http://schema.org',
				'@type'    => $post_meta['sub_schema_select'],
			);

			if ( ! empty( $post_meta['logo_url'] ) ) {
				$schema['image'] = $post_meta['logo_url'];
			}

			if ( ! empty( $post_meta['name'] ) ) {
				$schema['name'] = $post_meta['name'];
			}

			if ( ! empty( $post_meta['rating_value'] ) ) {
				$schema['review']                          = array();
				$schema['review']['@type']                 = 'Review';
				$schema['review']['reviewRating']          = array();
				$schema['review']['reviewRating']['@type'] = 'Rating';
				if ( ! empty( $post_meta['rating_value'] ) ) {
					$schema['review']['reviewRating']['ratingValue'] = $post_meta['rating_value'];
				}
			}

			if ( ! empty( $post_meta['reviewed_product'] ) ) {
				$schema['review']['name'] = $post_meta['reviewed_product'];
			}

			if ( ! empty( $post_meta['reviewed_by'] ) ) {
				$schema['review']['author']          = array();
				$schema['review']['author']['@type'] = 'Person';
				if ( ! empty( $post_meta['reviewed_by'] ) ) {
					$schema['review']['author']['name'] = $post_meta['reviewed_by'];
				}
			}

			if ( ! empty( $post_meta['date_published'] ) ) {
				$schema['review']['datePublished'] = $post_meta['date_published'];
			}

			if ( ! empty( $post_meta['description'] ) ) {
				$schema['review']['reviewBody'] = $post_meta['description'];
			}

			if ( ! empty( $post_meta['publisher_type'] ) ) {
				$schema['review']['publisher']          = array();
				$schema['review']['publisher']['@type'] = $post_meta['publisher_type'];
				if ( ! empty( $post_meta['publisher_name'] ) ) {
					$schema['review']['publisher']['name'] = $post_meta['publisher_name'];
				}
			}
		}

		return $schema;
	}

	/**
	 * Organization
	 *
	 * @param string schema type.
	 *
	 * @return array schema
	 */
	public static function organization( $schema_type ) {
		// Get the relevant meta.
		$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );

		if ( ! empty( $post_meta ) && 'Organization' === $schema_type ) {
			$schema = array(
				'@context' => 'http://schema.org',
				'@type'    => $post_meta['sub_schema_select'],
			);

			if ( ! empty( $post_meta['name'] ) ) {
				$schema['name'] = $post_meta['name'];
			}

			if ( ! empty( $post_meta['logo_url'] ) ) {
				$schema['logo'] = $post_meta['logo_url'];
			}

			if ( ! empty( $post_meta['description'] ) ) {
				$schema['description'] = $post_meta['description'];
			}

			if ( ! empty( $post_meta['address'] ) ) {
				$schema['address']                  = array();
				$schema['address']['@type']         = 'PostalAddress';
				$schema['address']['streetAddress'] = $post_meta['address'];
			}

			if ( ! empty( $post_meta['po_box'] ) ) {
				$schema['address']['postOfficeBoxNumber'] = $post_meta['po_box'];
			}

			if ( ! empty( $post_meta['city'] ) ) {
				$schema['address']['addressLocality'] = $post_meta['city'];
			}

			if ( ! empty( $post_meta['state_region'] ) ) {
				$schema['address']['addressRegion'] = $post_meta['state_region'];
			}

			if ( ! empty( $post_meta['zip_code'] ) ) {
				$schema['address']['postalCode'] = $post_meta['zip_code'];
			}

			if ( ! empty( $post_meta['country'] ) ) {
				$schema['address']['addressCountry'] = $post_meta['country'];
			}
		}

		return $schema;
	}

	/**
	 * Local Business
	 *
	 * @param string schema type.
	 *
	 * @return array schema
	 */
	public static function local_business( $schema_type ) {
		// Get the relevant meta.
		$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );

		if ( ! empty( $post_meta ) && 'LocalBusiness' === $schema_type ) {
			$schema = array(
				'@context' => 'http://schema.org',
				'@type'    => $post_meta['sub_schema_select'],
			);

			if ( ! empty( $post_meta['name'] ) ) {
				$schema['name'] = $post_meta['name'];
			}

			if ( ! empty( $post_meta['logo_url'] ) ) {
				$schema['logo'] = $post_meta['logo_url'];
			}

			if ( ! empty( $post_meta['description'] ) ) {
				$schema['description'] = $post_meta['description'];
			}

			if ( ! empty( $post_meta['address'] ) ) {
				$schema['address']                  = array();
				$schema['address']['@type']         = 'PostalAddress';
				$schema['address']['streetAddress'] = $post_meta['address'];
			}

			if ( ! empty( $post_meta['city'] ) ) {
				$schema['address']['addressLocality'] = $post_meta['city'];
			}

			if ( ! empty( $post_meta['state_region'] ) ) {
				$schema['address']['addressRegion'] = $post_meta['state_region'];
			}

			if ( ! empty( $post_meta['zip_code'] ) ) {
				$schema['address']['postalCode'] = $post_meta['zip_code'];
			}

			if ( ! empty( $post_meta['country'] ) ) {
				$schema['address']['addressCountry'] = $post_meta['country'];
			}
		}

		return $schema;
	}

	/**
	 * Person
	 *
	 * @param string schema type.
	 *
	 * @return array schema
	 */
	public static function person( $schema_type ) {
		// Get the relevant meta.
		$post_meta = get_post_meta( get_the_ID(), '_tutorstarter_schema', true );

		if ( ! empty( $post_meta ) && 'Person' === $schema_type ) {
			$schema = array(
				'@context' => 'http://schema.org',
				'@type'    => 'Person',
			);

			if ( ! empty( $post_meta['name'] ) ) {
				$schema['name'] = $post_meta['name'];
			}

			if ( ! empty( $post_meta['sub_schema_select'] ) ) {
				$schema['gender'] = $post_meta['sub_schema_select'];
			}

			if ( ! empty( $post_meta['job_title'] ) ) {
				$schema['jobTitle'] = $post_meta['job_title'];
			}

			if ( ! empty( $post_meta['height'] ) ) {
				$schema['height'] = $post_meta['height'];
			}

			if ( ! empty( $post_meta['address'] ) ) {
				$schema['address']                  = array();
				$schema['address']['@type']         = 'PostalAddress';
				$schema['address']['streetAddress'] = $post_meta['address'];
			}

			if ( ! empty( $post_meta['po_box'] ) ) {
				$schema['address']['postOfficeBoxNumber'] = $post_meta['po_box'];
			}

			if ( ! empty( $post_meta['city'] ) ) {
				$schema['address']['addressLocality'] = $post_meta['city'];
			}

			if ( ! empty( $post_meta['state_region'] ) ) {
				$schema['address']['addressRegion'] = $post_meta['state_region'];
			}

			if ( ! empty( $post_meta['zip_code'] ) ) {
				$schema['address']['postalCode'] = $post_meta['zip_code'];
			}

			if ( ! empty( $post_meta['country'] ) ) {
				$schema['address']['addressCountry'] = $post_meta['country'];
			}

			if ( ! empty( $post_meta['email'] ) ) {
				$schema['email'] = $post_meta['email'];
			}

			if ( ! empty( $post_meta['birth_date'] ) ) {
				$schema['birthDate'] = $post_meta['birth_date'];
			}

			if ( ! empty( $post_meta['birth_place'] ) ) {
				$schema['birthPlace'] = $post_meta['birth_place'];
			}

			if ( ! empty( $post_meta['nationality'] ) ) {
				$schema['nationality'] = $post_meta['nationality'];
			}
		}

		return $schema;
	}
}
