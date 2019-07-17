<?php
/**
 * Fallback Meta Fields
 *
 * @package     EPL-IMPORTER-ADD-ON
 * @subpackage  Functions/Admin
 * @copyright   Copyright (c) 2019, Merv Barrett
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Variables List required for meta boxes
 *
 * @since 1.0
 */
function epl_allimport_get_meta_fields() {
	global $epl_settings;
	$opts_property_status = apply_filters (  'epl_opts_property_status_filter', array(
			'current'	=>	__('Current', 'easy-property-listings'),
			'withdrawn'	=>	__('Withdrawn', 'easy-property-listings'),
			'offmarket'	=>	__('Off Market', 'easy-property-listings'),
			'sold'		=>	array(
				'label'		=>	apply_filters( 'epl_sold_label_status_filter' , __('Sold', 'easy-property-listings') ),
				'exclude'	=>	array('rental')
			),
			'leased'		=>	array(
				'label'		=>	apply_filters( 'epl_leased_label_status_filter' , __('Leased', 'easy-property-listings') ),
				'include'	=>	array('rental', 'commercial', 'commercial_land', 'business')
			)
		)
	);
	$opts_property_authority = apply_filters (  'epl_property_authority_filter', array(
			'exclusive'	=>	__('Exclusive', 'easy-property-listings'),
			'auction'	=>	__('Auction', 'easy-property-listings'),
			'multilist'	=>	__('Multilist', 'easy-property-listings'),
			'conjunctional'	=>	__('Conjunctional', 'easy-property-listings'),
			'open'		=>	__('Open', 'easy-property-listings'),
			'sale'		=>	__('Sale', 'easy-property-listings'),
			'setsale'	=>	__('Set Sale', 'easy-property-listings')
		)
	);
	$opts_property_exclusivity = apply_filters (  'epl_opts_property_exclusivity_filter', array(
			'exclusive'	=>	__('Exclusive', 'easy-property-listings'),
			'open'		=>	__('Open', 'easy-property-listings')
		)
	);
	$opts_property_com_authority = apply_filters (  'epl_opts_property_com_authority_filter', array(
			'Forsale'	=>	__('For Sale', 'easy-property-listings'),
			'auction'	=>	__('Auction', 'easy-property-listings'),
			'tender'	=>	__('Tender', 'easy-property-listings'),
			'eoi'		=>	__('EOI', 'easy-property-listings'),
			'Sale'		=>	__('Sale', 'easy-property-listings'),
			'offers'	=>	__('Offers', 'easy-property-listings')
		)
	);
	$opts_area_unit = apply_filters (  'epl_opts_area_unit_filter', array(
			'square'	=>	__('Square', 'easy-property-listings'),
			'squareMeter'	=>	__('Square Meter', 'easy-property-listings'),
			'acre'		=>	__('Acre', 'easy-property-listings'),
			'hectare'	=>	__('Hectare', 'easy-property-listings'),
			'sqft'		=>	__('Square Feet', 'easy-property-listings')
		)
	);
	$opts_rent_period = apply_filters (  'epl_opts_rent_period_filter', array(
			'day'		=>	__('Day', 'easy-property-listings'),
			'daily'		=>	__('Daily', 'easy-property-listings'),
			'week'		=>	__('Week', 'easy-property-listings'),
			'weekly'	=>	__('Weekly', 'easy-property-listings'),
			'month'		=>	__('Month', 'easy-property-listings'),
			'monthly'	=>	__('Monthly', 'easy-property-listings')
		)
	);
	$opts_property_com_listing_type = apply_filters (  'epl_opts_property_com_listing_type_filter', array(
			'sale'		=>	__('Sale', 'easy-property-listings'),
			'lease'		=>	__('Lease', 'easy-property-listings'),
			'both'		=>	__('Both', 'easy-property-listings')
		)
	);
	$opts_property_com_tenancy = apply_filters (  'epl_opts_property_com_tenancy_filter', array(
			'unknown'	=>	__('Unknown', 'easy-property-listings'),
			'vacant'	=>	__('Vacant', 'easy-property-listings'),
			'tenanted'	=>	__('Tenanted', 'easy-property-listings')
		)
	);
	$opts_property_com_property_extent = apply_filters (  'epl_opts_property_com_property_extent_filter', array(
			'whole'		=>	__('Whole', 'easy-property-listings'),
			'part'		=>	__('Part', 'easy-property-listings')
		)
	);

	global $epl_allimport_meta_boxes;
	$epl_allimport_meta_boxes = array(

		array(
			'id'		=>	'epl-property-listing-section-id',
			'label'		=>	__('Listing Details', 'easy-property-listings'),
			'post_type'	=>	array('property', 'rural', 'rental', 'land', 'commercial', 'commercial_land', 'business'),
			'context'	=>	'normal',
			'priority'	=>	'default',
			'groups'	=>	array(
				array(
					'id'		=>	'property_heading',
					'columns'	=>	'1',
					'label'		=>	'',
					'fields'	=>	array(
						array(
							'name'		=>	'property_heading',
							'label'		=>	__('Heading', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'200'
						)
					)
				),

				array(
					'id'		=>	'listing_agents',
					'columns'	=>	'1',
					'label'		=>	__('Listing Agent(s)', 'easy-property-listings'),
					'fields'	=>	array(
						array(
							'name'		=>	'property_office_id',
							'label'		=>	__('Office ID', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'50'
						),

						array(
							'name'		=>	'property_agent',
							'label'		=>	__('Listing Agent', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'40'
						),

						array(
							'name'		=>	'property_second_agent',
							'label'		=>	__('Second Listing Agent', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'40',
							'help'		=>	__('Search for secondary agent.','easy-property-listings')
						),

						array(
							'name'		=>	'property_agent_hide_author_box',
							'label'		=>	__('Hide Author Box', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'		=>	array(
								'yes'	=>	__('Hide Author Box', 'easy-property-listings'),
							)
						)
					)
				),

				array(
					'id'		=>	'listing_type',
					'columns'	=>	'2',
					'label'		=>	__('Listing Type', 'easy-property-listings'),
					'fields'	=>	array(
						array(
							'name'		=>	'property_status',
							'label'		=>	__('Property Status', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	$opts_property_status
						),

						array(
							'name'		=>	'property_list_date',
							'label'		=>	__('Date Listed', 'easy-property-listings'),
							'type'		=>	'date',
							'maxlength'	=>	'100'
						),

						array(
							'name'		=>	'property_authority',
							'label'		=>	__('Authority', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	$opts_property_authority,
							'exclude'	=>	array('rental', 'commercial', 'commercial_land')
						),

						array(
							'name'		=>	'property_category',
							'label'		=>	__('House Category', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	epl_listing_load_meta_property_category(),
							'exclude'	=>	array('land', 'commercial', 'commercial_land', 'business', 'rural')
						),

						array(
							'name'		=>	'property_rural_category',
							'label'		=>	__('Rural Category', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	epl_listing_load_meta_rural_category(),
							'include'	=>	array('rural')
						),

						array(
							'name'		=>	'property_unique_id',
							'label'		=>	__('Unique ID', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'50'
						),

						array(
							'name'		=>	'property_mod_date',
							'label'		=>	__('XML Importer Mod Date', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'60'
						),

						array(
							'name'		=>	'property_images_mod_date',
							'label'		=>	'',
							'type'		=>	'hidden',
							'maxlength'	=>	'60'
						),

						array(
							'name'		=>	'property_com_authority',
							'label'		=>	__('Commercial Authority', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	$opts_property_com_authority,
							'include'	=>	array('commercial', 'commercial_land', 'business')
						),

						array(
							'name'		=>	'property_com_exclusivity',
							'label'		=>	__('Exclusivity', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	$opts_property_exclusivity,
							'include'	=>	array('commercial', 'commercial_land', 'business')
						),

						array(
							'name'		=>	'property_com_listing_type',
							'label'		=>	__('Commercial Listing Type', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	$opts_property_com_listing_type,
							'include'	=>	array('commercial', 'commercial_land' , 'business' )
						),

						array(
							'name'		=>	'property_commercial_category',
							'label'		=>	__('Commercial Category', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	epl_listing_load_meta_commercial_category(),
							'include'	=>	array('commercial', 'commercial_land')
						),
					)
				),

				array(
					'id'		=>	'display_details',
					'columns'	=>	'2',
					'label'		=>	__('Display Details', 'easy-property-listings'),
					'fields'	=>	array(
						array(
							'name'		=>	'property_featured',
							'label'		=>	__('Featured', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_inspection_times',
							'label'		=>	__('Inspection Times ( one per line )', 'easy-property-listings'),
							'type'		=>	'textarea',
							'maxlength'	=>	'500'
						)
					)
				)
			)
		),

		array(
			'id'		=>	'epl-features-section-id',
			'label'		=>	__('Listing Features', 'easy-property-listings'),
			'post_type'	=>	array('property', 'rural', 'rental' ),
			'context'	=>	'normal',
			'priority'	=>	'default',
			'groups'	=>	array(
				array(
					'id'		=>	'house_features',
					'columns'	=>	'2',
					'label'		=>	__('House Features', 'easy-property-listings'),
					'fields'	=>	array(
						array(
							'name'		=>	'property_bedrooms',
							'label'		=>	__('Bedrooms', 'easy-property-listings'),
							'type'		=>	'text',
							'class'		=>	'validate[custom[bedroom]]'
						),

						array(
							'name'		=>	'property_bathrooms',
							'label'		=>	__('Bathrooms', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'4'
						),

						array(
							'name'		=>	'property_rooms',
							'label'		=>	__('Rooms', 'easy-property-listings'),
							'type'		=>	'number',
							'maxlength'	=>	'3'
						),

						array(
							'name'		=>	'property_ensuite',
							'label'		=>	__('Ensuite', 'easy-property-listings'),
							'type'		=>	'number',
							'maxlength'	=>	'2'
						),

						array(
							'name'		=>	'property_toilet',
							'label'		=>	__('Toilet', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'4'
						),

						array(
							'name'		=>	'property_garage',
							'label'		=>	__('Garage', 'easy-property-listings'),
							'type'		=>	'number',
							'maxlength'	=>	'2'
						),

						array(
							'name'		=>	'property_carport',
							'label'		=>	__('Carport', 'easy-property-listings'),
							'type'		=>	'number',
							'maxlength'	=>	'2'
						),

						array(
							'name'		=>	'property_open_spaces',
							'label'		=>	__('Open Spaces', 'easy-property-listings'),
							'type'		=>	'number',
							'maxlength'	=>	'2'
						),

						array(
							'name'		=>	'property_year_built',
							'label'		=>	__('Year Built', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'4'
						),

						array(
							'name'		=>	'property_new_construction',
							'label'		=>	__('New Construction', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
							'include'	=>	array('property', 'rental' )
						),

						array(
							'name'		=>	'property_pool',
							'label'		=>	__('Pool', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_air_conditioning',
							'label'		=>	__('Air Conditioning', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_security_system',
							'label'		=>	__('Security System', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_pet_friendly',
							'label'		=>	__('Pet Friendly', 'easy-property-listings'),
							'type'		=>	'radio',
							'include'	=>	array('rental'),
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						)
					)
				),

				array(
					'id'		=>	'land_details',
					'columns'	=>	'2',
					'label'		=>	__('Land Details', 'easy-property-listings'),
					'fields'	=>	array(
						array(
							'name'		=>	'property_land_area',
							'label'		=>	__('Land Area', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'50'
						),

						array(
							'name'		=>	'property_land_area_unit',
							'label'		=>	__('Land Unit', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	$opts_area_unit
						),

						array(
							'name'		=>	'property_building_area',
							'label'		=>	__('Building Area', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'50'
						),

						array(
							'name'		=>	'property_building_area_unit',
							'label'		=>	__('Building Unit', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	$opts_area_unit
						),

						array(
							'name'		=>	'property_land_fully_fenced',
							'label'		=>	__('Fully Fenced', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						)
					)
				)
			)
		),

		array( // Additional Features
			'id'		=>	'epl-additional-features-section-id',
			'label'		=>	__('Additional Features', 'easy-property-listings'),
			'post_type'	=>	array('property', 'rural', 'rental' ),
			'context'	=>	'normal',
			'priority'	=>	'default',
			'groups'	=>	array(
				array(
					'id'		=>	'internal',
					'columns'	=>	'3',
					'label'		=>	__('Internal', 'easy-property-listings'),
					'fields'	=>	array(

						array(
							'name'		=>	'property_remote_garage',
							'label'		=>	__('Remote Garage', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_secure_parking',
							'label'		=>	__('Secure Parking', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_study',
							'label'		=>	__('Study', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_dishwasher',
							'label'		=>	__('Dishwasher', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_built_in_robes',
							'label'		=>	__('Built In Robes', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_gym',
							'label'		=>	__('Gym', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_workshop',
							'label'		=>	__('Workshop', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_rumpus_room',
							'label'		=>	__('Rumpus Room', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_floor_boards',
							'label'		=>	__('Floor Boards', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_broadband',
							'label'		=>	__('Broadband', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_pay_tv',
							'label'		=>	__('Pay TV', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),
						array(
							'name'		=>	'property_vacuum_system',
							'label'		=>	__('Vacuum System', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_intercom',
							'label'		=>	__('Intercom', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_spa',
							'label'		=>	__('Spa', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						)
					)
				),

				array(
					'id'		=>	'external',
					'columns'	=>	'3',
					'label'		=>	__('External', 'easy-property-listings'),
					'fields'	=>	array(

						array(
							'name'		=>	'property_tennis_court',
							'label'		=>	__('Tennis Court', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_balcony',
							'label'		=>	__('Balcony', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_deck',
							'label'		=>	__('Deck', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_courtyard',
							'label'		=>	__('Courtyard', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_outdoor_entertaining',
							'label'		=>	__('Outdoor Entertaining', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_shed',
							'label'		=>	__('Shed', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						)
					)
				),

				array(
					'id'		=>	'heating_cooling',
					'columns'	=>	'3',
					'label'		=>	__('Heating & Cooling', 'easy-property-listings'),
					'fields'	=>	array(

						array(
							'name'		=>	'property_ducted_heating',
							'label'		=>	__('Ducted Heating', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_ducted_cooling',
							'label'		=>	__('Ducted Cooling', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_split_system_heating',
							'label'		=>	__('Split System Heating', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_hydronic_heating',
							'label'		=>	__('Hydronic Heating', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_split_system_aircon',
							'label'		=>	__('Split System Aircon', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_gas_heating',
							'label'		=>	__('Gas Heating', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_reverse_cycle_aircon',
							'label'		=>	__('Reverse Cycle Aircon', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_evaporative_cooling',
							'label'		=>	__('Evaporative Cooling', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_open_fire_place',
							'label'		=>	__('Open Fire Place', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						)
					)
				)
			)
		),

		array( //Repeating most from above "epl-features-section-id" because on land it will be single column
			'id'		=>	'epl-features-section-id-single-column',
			'label'		=>	__('Land Details', 'easy-property-listings'),
			'post_type'	=>	array('land', 'commercial', 'business'),
			'context'	=>	'normal',
			'priority'	=>	'default',
			'groups'	=>	array(
				array(
					'id'		=>	'land_details',
					'columns'	=>	'1',
					'label'		=>	'',
					'fields'	=>	array(
						array(
							'name'		=>	'property_land_area',
							'label'		=>	__('Land Area', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'50'
						),

						array(
							'name'		=>	'property_land_area_unit',
							'label'		=>	__('Land Unit', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	$opts_area_unit
						),

						array(
							'name'		=>	'property_building_area',
							'label'		=>	__('Building Area', 'easy-property-listings'),
							'type'		=>	'number',
							'include'	=>	array('commercial','business'),
							'maxlength'	=>	'40'
						),

						array(
							'name'		=>	'property_building_area_unit',
							'label'		=>	__('Building Unit', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	$opts_area_unit,
							'include'	=>	array('commercial','business')
						),

						array(
							'name'		=>	'property_land_category',
							'label'		=>	__('Land Category', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	epl_listing_load_meta_land_category(),
							'include'	=>	array('land')
						),

						array(
							'name'		=>	'property_land_fully_fenced',
							'label'		=>	__('Fully Fenced', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
							'include'	=>	array('land')
						)
					)
				)
			)
		),

		array(
			'id'		=>	'epl-property-address-section-id',
			'label'		=>	__('Property Address', 'easy-property-listings'),
			'post_type'	=>	array('property', 'rural', 'rental', 'commercial', 'commercial_land', 'business', 'land','contact_listing'),
			'context'	=>	'side',
			'priority'	=>	'core',
			'groups'	=>	array(	apply_filters('epl_listing_meta_address_block',
					array(
						'id'		=>	'address_block',
						'columns'	=>	'1',
						'label'		=>	'',
						'fields'	=>	array(
							array(
								'name'		=>	'property_address_display',
								'label'		=>	__('Display Street Address?', 'easy-property-listings'),
								'type'		=>	'radio',
								'opts'		=>	array(
									'yes'	=>	__('Yes', 'easy-property-listings'),
								),
							),

							array(
								'name'		=>	'property_address_lot_number',
								'label'		=>	__('Lot', 'easy-property-listings'),
								'type'		=>	'text',
								'maxlength'	=>	'40',
								'include'	=>	array('land', 'commercial_land')
							),

							array(
								'name'		=>	'property_address_sub_number',
								'label'		=>	__('Unit', 'easy-property-listings'),
								'type'		=>	'text',
								'maxlength'	=>	'40',
								'exclude'	=>	array('land', 'commercial_land')
							),

							array(
								'name'		=>	'property_address_street_number',
								'label'		=>	__('Street Number', 'easy-property-listings'),
								'type'		=>	'text',
								'maxlength'	=>	'40'
							),

							array(
								'name'		=>	'property_address_street',
								'label'		=>	__('Street Name', 'easy-property-listings'),
								'type'		=>	'text',
								'maxlength'	=>	'80'
							),

							array(
								'name'		=>	'property_address_suburb',
								'label'		=>	epl_labels('label_suburb'),
								'type'		=>	'text',
								'maxlength'	=>	'80'
							),

							array(
								'name'		=>	'property_com_display_suburb',
								'label'		=>	__('Display', 'easy-property-listings') . ' ' .epl_labels('label_suburb'),
								'type'		=>	'radio',
								'opts'		=>	array(
									'yes'	=>	__('Yes', 'easy-property-listings'),
								),
								'include'	=>	array('commercial', 'commercial_land', 'business'),
							),

							( isset($epl_settings['epl_enable_city_field'] ) &&  $epl_settings['epl_enable_city_field'] == 'yes' ) ?
							array(
								'name'		=>	'property_address_city',
								'label'		=>	epl_labels('label_city'),
								'type'		=>	'text',
								'maxlength'	=>	'80'
							) : array(),

							array(
								'name'		=>	'property_address_state',
								'label'		=>	epl_labels('label_state'),
								'type'		=>	'text',
								'maxlength'	=>	'80'
							),

							array(
								'name'		=>	'property_address_postal_code',
								'label'		=>	epl_labels('label_postcode'),
								'type'		=>	'text',
								'maxlength'	=>	'30'
							),

							array(
								'name'		=>	'property_address_country',
								'label'		=>	__('Country', 'easy-property-listings'),
								'type'		=>	'text',
								'maxlength'	=>	'40'
							),

							array(
								'name'		=>	'property_address_coordinates',
								'label'		=>	__('Coordinates', 'easy-property-listings'),
								'type'		=>	'text',
								'help'		=>	__('Drag the pin to manually set listing coordinates', 'easy-property-listings'),
								'geocoder'	=>	'true',
								'maxlength'	=>	'40'
							),
							array(
								'name'		=>	'property_address_hide_map',
								'label'		=>	__('Hide Map', 'easy-property-listings'),
								'type'		=>	'radio',
								'opts'		=>	array(
									'yes'	=>	__('Yes', 'easy-property-listings'),
								)
							)
						)
					)
				)
			)
		),

		array(
			'id'		=>	'epl-pricing-section-id',
			'label'		=>	__('Pricing', 'easy-property-listings'),
			'post_type'	=>	array('property', 'rural', 'commercial', 'commercial_land', 'business', 'land'),
			'context'	=>	'side',
			'priority'	=>	'core',
			'groups'	=>	array(
				array(
					'id'		=>	'pricing',
					'columns'	=>	'1',
					'label'		=>	'',
					'fields'	=>	array(
						array(
							'name'		=>	'property_price',
							'label'		=>	__('Search Price', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'50'
						),

						array(
							'name'		=>	'property_price_view',
							'label'		=>	__('Price Text', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'50'
						),

						array(
							'name'		=>	'property_auction',
							'label'		=>	__('Auction Date', 'easy-property-listings'),
							'type'		=>	'auction-date',
							'maxlength'	=>	'100'
						),

						array(
							'name'		=>	'property_price_display',
							'label'		=>	__('Display Price?', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'		=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_under_offer',
							'label'		=>	epl_meta_under_offer_label(),
							'type'		=>	'radio',
							'opts'		=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_is_home_land_package',
							'label'		=>	__('House and Land Package', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'		=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
							'exclude'	=>	array('land', 'rural', 'commercial', 'commercial_land' , 'business')
						)
					)
				),

				array(
					'id'		=>	'sale_details',
					'columns'	=>	'1',
					'label'		=>	__('Sale Details', 'easy-property-listings'),
					'fields'	=>	array(
						array(
							'name'		=>	'property_sold_price',
							'label'		=>	__('Sale Price', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'50'
						),

						array(
							'name'		=>	'property_sold_date',
							'label'		=>	__('Sale Date', 'easy-property-listings'),
							'type'		=>	'sold-date',
							'maxlength'	=>	'100'
						),

						array(
							'name'		=>	'property_sold_price_display',
							'label'		=>	__('Display Sale Price', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'		=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						)
					)
				)
			)
		),

		array(
			'id'		=>	'epl-property-rent-id',
			'label'		=>	__('Rental Pricing', 'easy-property-listings'),
			'post_type'	=>	array('rental'),
			'context'	=>	'side',
			'priority'	=>	'core',
			'groups'	=>	array(
				array(
					'id'		=>	'rental_pricing',
					'columns'	=>	'1',
					'label'		=>	'',
					'fields'	=>	array(
						array(
							'name'		=>	'property_rent',
							'label'		=>	__('Rent Amount', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'40'
						),

						array(
							'name'		=>	'property_rent_period',
							'label'		=>	__('Rent Period', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	$opts_rent_period
						),

						array(
							'name'		=>	'property_rent_view',
							'label'		=>	__('Rent Text', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'50'
						),

						array(
							'name'		=>	'property_rent_display',
							'label'		=>	__('Display Rent?', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'		=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_bond',
							'label'		=>	epl_labels('label_bond'),
							'type'		=>	'text',
							'maxlength'	=>	'40'
						),

						array(
							'name'		=>	'property_date_available',
							'label'		=>	__('Date Available', 'easy-property-listings'),
							'type'		=>	'date',
							'maxlength'	=>	'100'
						),

						array(
							'name'		=>	'property_furnished',
							'label'		=>	__('Furnished', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'		=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
						),

						array(
							'name'		=>	'property_holiday_rental',
							'label'		=>	__('Holiday Rental', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'		=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
							'exclude'	=>	array('rental')
						),
					)
				)
			)
		),

		array(
			'id'		=>	'epl-rural-features-id',
			'label'		=>	__('Rural Features', 'easy-property-listings'),
			'post_type'	=>	array('rural'),
			'context'	=>	'normal',
			'priority'	=>	'default',
			'groups'	=>	array(
				array(
					'id'		=>	'rural_features',
					'columns'	=>	'1',
					'label'		=>	'',
					'fields'	=>	array(
						array(
							'name'		=>	'property_rural_fencing',
							'label'		=>	__('Fencing', 'easy-property-listings'),
							'type'		=>	'textarea',
							'maxlength'	=>	'65535'
						),

						array(
							'name'		=>	'property_rural_annual_rainfall',
							'label'		=>	__('Annual Rainfall', 'easy-property-listings'),
							'type'		=>	'textarea',
							'maxlength'	=>	'65535'
						),

						array(
							'name'		=>	'property_rural_soil_types',
							'label'		=>	__('Soil Types', 'easy-property-listings'),
							'type'		=>	'textarea',
							'maxlength'	=>	'65535'
						),

						array(
							'name'		=>	'property_rural_improvements',
							'label'		=>	__('Improvements', 'easy-property-listings'),
							'type'		=>	'textarea',
							'maxlength'	=>	'65535'
						),

						array(
							'name'		=>	'property_rural_council_rates',
							'label'		=>	__('Council Rates', 'easy-property-listings'),
							'type'		=>	'textarea',
							'maxlength'	=>	'65535'
						),

						array(
							'name'		=>	'property_rural_irrigation',
							'label'		=>	__('Irrigation', 'easy-property-listings'),
							'type'		=>	'textarea',
							'maxlength'	=>	'65535'
						),

						array(
							'name'		=>	'property_rural_carrying_capacity',
							'label'		=>	__('Carrying Capacity', 'easy-property-listings'),
							'type'		=>	'textarea',
							'maxlength'	=>	'65535'
						),

						array(
							'name'		=>	'property_rural_services',
							'label'		=>	__('Services', 'easy-property-listings'),
							'type'		=>	'textarea',
							'maxlength'	=>	'65535'
						)
					)
				)
			)
		),

		array(
			'id'		=>	'epl-commercial-leasing-id',
			'label'		=>	__('Leasing', 'easy-property-listings'),
			'post_type'	=>	array('commercial', 'commercial_land' , 'business'),
			'context'	=>	'normal',
			'priority'	=>	'default',
			'groups'	=>	array(
				array(
					'id'		=>	'commercial_leasing',
					'columns'	=>	'2',
					'label'		=>	'',
					'fields'	=>	array(
						array(
							'name'		=>	'property_com_rent',
							'label'		=>	__('Commercial Rent', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'40',
							'help'		=>	__('Price Text in Pricing box over-rides displayed price' , 'easy-property-listings')
						),
						array(
							'name'		=>	'property_com_rent_period',
							'label'		=>	__('Lease Period', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	epl_listing_load_meta_commercial_rent_period()
						),
						array(
							'name'		=>	'property_com_rent_range_min',
							'label'		=>	__('Rent Range Min', 'easy-property-listings'),
							'type'		=>	'number',
							'maxlength'	=>	'40'
						),

						array(
							'name'		=>	'property_com_rent_range_max',
							'label'		=>	__('Rent Range Max', 'easy-property-listings'),
							'type'		=>	'number',
							'maxlength'	=>	'40'
						),

						array(
							'name'		=>	'property_com_lease_end_date',
							'label'		=>	__('Lease End Date', 'easy-property-listings'),
							'type'		=>	'date',
							'maxlength'	=>	'100'
						),

						array(
							'name'		=>	'property_com_property_extent',
							'label'		=>	__('Property Extent', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	$opts_property_com_property_extent
						)
					)
				),

				array(
					'id'		=>	'tenant_n_outgoings',
					'columns'	=>	'2',
					'label'		=>	'',
					'fields'	=>	array(
						array(
							'name'		=>	'property_com_tenancy',
							'label'		=>	__('Tenant Status', 'easy-property-listings'),
							'type'		=>	'select',
							'opts'		=>	$opts_property_com_tenancy,
							'include'	=>	array('commercial')
						),

						array(
							'name'		=>	'property_com_outgoings',
							'label'		=>	__('Commercial Outgoings', 'easy-property-listings'),
							'type'		=>	'number',
							'maxlength'	=>	'40',
							'exclude'	=>	array('business')
						),

						array(
							'name'		=>	'property_com_plus_outgoings',
							'label'		=>	__('Plus Outgoings', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'		=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
							'exclude'	=>	array('business')
						),

						array(
							'name'		=>	'property_bus_takings',
							'label'		=>	__('Takings', 'easy-property-listings'),
							'type'		=>	'number',
							'maxlength'	=>	'40',
							'include'	=>	array('business')
						),

						array(
							'name'		=>	'property_bus_franchise',
							'label'		=>	__('Franchise', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'		=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							),
							'include'	=>	array('business')
						),

						array(
							'name'		=>	'property_com_return',
							'label'		=>	__('Return', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'6'
						),

						array(
							'name'		=>	'property_bus_terms',
							'label'		=>	__('Terms', 'easy-property-listings'),
							'type'		=>	'textarea'
						)
					)
				)
			)
		),

		array(
			'id'		=>	'epl-commercial-features-id',
			'label'		=>	__('Commercial Features', 'easy-property-listings'),
			'post_type'	=>	array('commercial'),
			'context'	=>	'normal',
			'priority'	=>	'default',
			'groups'	=>	array(
				array(
					'id'		=>	'commerial_features',
					'columns'	=>	'1',
					'label'		=>	'',
					'fields'	=>	array(
						array(
							'name'		=>	'property_com_further_options',
							'label'		=>	__('Further Options', 'easy-property-listings'),
							'type'		=>	'textarea',
							'maxlength'	=>	'65535'
						),

						array(
							'name'		=>	'property_com_zone',
							'label'		=>	__('Zone', 'easy-property-listings'),
							'type'		=>	'textarea',
							'maxlength'	=>	'150'
						),

						array(
							'name'		=>	'property_com_car_spaces',
							'label'		=>	__('Car Spaces', 'easy-property-listings'),
							'type'		=>	'number',
							'type'		=>	'textarea',
							'maxlength'	=>	'5'
						),

						array(
							'name'		=>	'property_com_highlight_1',
							'label'		=>	__('Highlight 1', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'40'
						),

						array(
							'name'		=>	'property_com_highlight_2',
							'label'		=>	__('Highlight 2', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'40'
						),

						array(
							'name'		=>	'property_com_highlight_3',
							'label'		=>	__('Highlight 3', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'40'
						),

						array(
							'name'		=>	'property_com_parking_comments',
							'label'		=>	__('Parking Comments', 'easy-property-listings'),
							'type'		=>	'text',
							'maxlength'	=>	'150'
						),

						array(
							'name'		=>	'property_com_is_multiple',
							'label'		=>	__('Is Multiple', 'easy-property-listings'),
							'type'		=>	'radio',
							'opts'	=>	array(
								'yes'	=>	__('Yes', 'easy-property-listings'),
							)
						)
					)
				)
			)
		),

		array(
			'id'		=>	'epl-business-features-id',
			'label'		=>	__('Business Categories', 'easy-property-listings'),
			'post_type'	=>	array('business'),
			'context'	=>	'normal',
			'priority'	=>	'default',
			'groups'	=>	array(
				array(
					'id'		=>	'business_categories',
					'columns'	=>	'1',
					'label'		=>	'',
					'fields'	=>	array(
						array(
							'name'		=>	'property_bus_category',
							'label'		=>	__('Business Category', 'easy-property-listings'),
							'type'		=>	'select',
							'opt_args'	=>	array(
								'type'	=>	'taxonomy',
								'slug'	=>	'tax_business_listing'
							)
						),

						array(
							'name'		=>	'property_bus_sub_category',
							'label'		=>	__('Business Sub Category', 'easy-property-listings'),
							'type'		=>	'select',
							'opt_args'	=>	array(
								'type'	=>	'taxonomy',
								'slug'	=>	'tax_business_listing',
								'parent'=>	'property_bus_category'
							)
						),

						array(
							'name'		=>	'property_bus_category_2',
							'label'		=>	__('Business Category 2', 'easy-property-listings'),
							'type'		=>	'select',
							'opt_args'	=>	array(
								'type'	=>	'taxonomy',
								'slug'	=>	'tax_business_listing'
							)
						),

						array(
							'name'		=>	'property_bus_sub_category_2',
							'label'		=>	__('Business Sub Category 2', 'easy-property-listings'),
							'type'		=>	'select',
							'opt_args'	=>	array(
								'type'	=>	'taxonomy',
								'slug'	=>	'tax_business_listing',
								'parent'=>	'property_bus_category_2'
							)
						),

						array(
							'name'		=>	'property_bus_category_3',
							'label'		=>	__('Business Category 3', 'easy-property-listings'),
							'type'		=>	'select',
							'opt_args'	=>	array(
								'type'	=>	'taxonomy',
								'slug'	=>	'tax_business_listing'
							)
						),

						array(
							'name'		=>	'property_bus_sub_category_3',
							'label'		=>	__('Business Sub Category 3', 'easy-property-listings'),
							'type'		=>	'select',
							'opt_args'	=>	array(
								'type'	=>	'taxonomy',
								'slug'	=>	'tax_business_listing',
								'parent'=>	'property_bus_category_3'
							)
						),
					)
				)
			)
		),

		array(
			'id'		=>	'epl-attachments-section-id',
			'label'		=>	__('Files and Links', 'easy-property-listings'),
			'post_type'	=>	array('property', 'rural', 'commercial', 'commercial_land', 'business', 'rental', 'land'),
			'context'	=>	'normal',
			'priority'	=>	'default',
			'groups'	=>	array(
				array(
					'id'		=>	'filen_n_links',
					'columns'	=>	'1',
					'label'		=>	'',
					'fields'	=>	array(
						array(
							'name'		=>	'property_video_url',
							'label'		=>	__('Video URL', 'easy-property-listings'),
							'type'		=>	'url'
						),

						array(
							'name'		=>	'property_floorplan',
							'label'		=>	__('Floorplan', 'easy-property-listings'),
							'type'		=>	'url'
						),
						array(
							'name'		=>	'property_floorplan_2',
							'label'		=>	__('Floorplan 2', 'easy-property-listings'),
							'type'		=>	'url'
						),

						array(
							'name'		=>	'property_external_link',
							'label'		=>	__('External Link', 'easy-property-listings'),
							'type'		=>	'url'
						),

						array(
							'name'		=>	'property_external_link_2',
							'label'		=>	__('External Link 2', 'easy-property-listings'),
							'type'		=>	'url'
						),
						array(
							'name'		=>	'property_external_link_3',
							'label'		=>	__('External Link 3', 'easy-property-listings'),
							'type'		=>	'url',
							'include'	=>	array('commercial', 'business', 'commercial_land'),
						),

						array(
							'name'		=>	'property_com_mini_web',
							'label'		=>	__('Mini Website URL', 'easy-property-listings'),
							'type'		=>	'url',
							'include'	=>	array('commercial', 'business', 'commercial_land'),
						),
						array(
							'name'		=>	'property_com_mini_web_2',
							'label'		=>	__('Mini Website URL 2', 'easy-property-listings'),
							'type'		=>	'url',
							'include'	=>	array('commercial', 'business', 'commercial_land'),
						),
						array(
							'name'		=>	'property_com_mini_web_3',
							'label'		=>	__('Mini Website URL 3', 'easy-property-listings'),
							'type'		=>	'url',
							'include'	=>	array('commercial', 'business', 'commercial_land'),
						),
					)
				)
			)
		),

		array(
			'id'		=>	'epl-owner-listings-section-id',
			'label'		=>	__('Linked Contact', 'easy-property-listings'),
			'post_type'	=>	array('property', 'rural', 'commercial', 'commercial_land', 'business', 'rental', 'land'),
			'context'	=>	'side',
			'priority'	=>	'default',
			'groups'	=>	array(
				array(
					'id'		=>	'owner_details',
					'columns'	=>	'1',
					'label'		=>	'',
					'fields'	=>	array(
						array(
							'name'		=>	'property_owner',
							'label'		=>	__('Contact ID','easy-property-listings'),
							'type'		=>	'text',
							'help'		=>	__('Search for contact and update to save.','easy-property-listings')
						),
					)
				)
			)
		),
	);

	if(!empty($epl_allimport_meta_boxes)) {
		foreach($epl_allimport_meta_boxes as &$epl_meta_box) {
			$meta_box_block_id = str_replace("-","_",$epl_meta_box['id']);
			$epl_meta_box = apply_filters('epl_meta_box_block_'.$meta_box_block_id,$epl_meta_box);
			if(!empty($epl_meta_box['groups'])) {
				foreach($epl_meta_box['groups'] as &$group) {
					$group = apply_filters('epl_meta_groups_'.$group['id'], $group);
					if(!empty($group['fields'])) {
						$group['fields'] = array_filter($group['fields']);
						foreach($group['fields'] as &$fieldvalue) {

							$fieldvalue = apply_filters('epl_meta_'.$fieldvalue['name'], $fieldvalue);
						}
					}

				}
			}
		}
		return $epl_allimport_meta_boxes = apply_filters('epl_listing_meta_boxes', $epl_allimport_meta_boxes);
	}
}
