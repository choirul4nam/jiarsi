<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage LYMCOIN
 * @since LYMCOIN 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) { exit; }

// Get theme variable
if (!function_exists('lymcoin_storage_get')) {
	function lymcoin_storage_get($var_name, $default='') {
		global $LYMCOIN_STORAGE;
		return isset($LYMCOIN_STORAGE[$var_name]) ? $LYMCOIN_STORAGE[$var_name] : $default;
	}
}

// Set theme variable
if (!function_exists('lymcoin_storage_set')) {
	function lymcoin_storage_set($var_name, $value) {
		global $LYMCOIN_STORAGE;
		$LYMCOIN_STORAGE[$var_name] = $value;
	}
}

// Check if theme variable is empty
if (!function_exists('lymcoin_storage_empty')) {
	function lymcoin_storage_empty($var_name, $key='', $key2='') {
		global $LYMCOIN_STORAGE;
		if (!empty($key) && !empty($key2))
			return empty($LYMCOIN_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return empty($LYMCOIN_STORAGE[$var_name][$key]);
		else
			return empty($LYMCOIN_STORAGE[$var_name]);
	}
}

// Check if theme variable is set
if (!function_exists('lymcoin_storage_isset')) {
	function lymcoin_storage_isset($var_name, $key='', $key2='') {
		global $LYMCOIN_STORAGE;
		if (!empty($key) && !empty($key2))
			return isset($LYMCOIN_STORAGE[$var_name][$key][$key2]);
		else if (!empty($key))
			return isset($LYMCOIN_STORAGE[$var_name][$key]);
		else
			return isset($LYMCOIN_STORAGE[$var_name]);
	}
}

// Inc/Dec theme variable with specified value
if (!function_exists('lymcoin_storage_inc')) {
	function lymcoin_storage_inc($var_name, $value=1) {
		global $LYMCOIN_STORAGE;
		if (empty($LYMCOIN_STORAGE[$var_name])) $LYMCOIN_STORAGE[$var_name] = 0;
		$LYMCOIN_STORAGE[$var_name] += $value;
	}
}

// Concatenate theme variable with specified value
if (!function_exists('lymcoin_storage_concat')) {
	function lymcoin_storage_concat($var_name, $value) {
		global $LYMCOIN_STORAGE;
		if (empty($LYMCOIN_STORAGE[$var_name])) $LYMCOIN_STORAGE[$var_name] = '';
		$LYMCOIN_STORAGE[$var_name] .= $value;
	}
}

// Get array (one or two dim) element
if (!function_exists('lymcoin_storage_get_array')) {
	function lymcoin_storage_get_array($var_name, $key, $key2='', $default='') {
		global $LYMCOIN_STORAGE;
		if (empty($key2))
			return !empty($var_name) && !empty($key) && isset($LYMCOIN_STORAGE[$var_name][$key]) ? $LYMCOIN_STORAGE[$var_name][$key] : $default;
		else
			return !empty($var_name) && !empty($key) && isset($LYMCOIN_STORAGE[$var_name][$key][$key2]) ? $LYMCOIN_STORAGE[$var_name][$key][$key2] : $default;
	}
}

// Set array element
if (!function_exists('lymcoin_storage_set_array')) {
	function lymcoin_storage_set_array($var_name, $key, $value) {
		global $LYMCOIN_STORAGE;
		if (!isset($LYMCOIN_STORAGE[$var_name])) $LYMCOIN_STORAGE[$var_name] = array();
		if ($key==='')
			$LYMCOIN_STORAGE[$var_name][] = $value;
		else
			$LYMCOIN_STORAGE[$var_name][$key] = $value;
	}
}

// Set two-dim array element
if (!function_exists('lymcoin_storage_set_array2')) {
	function lymcoin_storage_set_array2($var_name, $key, $key2, $value) {
		global $LYMCOIN_STORAGE;
		if (!isset($LYMCOIN_STORAGE[$var_name])) $LYMCOIN_STORAGE[$var_name] = array();
		if (!isset($LYMCOIN_STORAGE[$var_name][$key])) $LYMCOIN_STORAGE[$var_name][$key] = array();
		if ($key2==='')
			$LYMCOIN_STORAGE[$var_name][$key][] = $value;
		else
			$LYMCOIN_STORAGE[$var_name][$key][$key2] = $value;
	}
}

// Merge array elements
if (!function_exists('lymcoin_storage_merge_array')) {
	function lymcoin_storage_merge_array($var_name, $key, $value) {
		global $LYMCOIN_STORAGE;
		if (!isset($LYMCOIN_STORAGE[$var_name])) $LYMCOIN_STORAGE[$var_name] = array();
		if ($key==='')
			$LYMCOIN_STORAGE[$var_name] = array_merge($LYMCOIN_STORAGE[$var_name], $value);
		else
			$LYMCOIN_STORAGE[$var_name][$key] = array_merge($LYMCOIN_STORAGE[$var_name][$key], $value);
	}
}

// Add array element after the key
if (!function_exists('lymcoin_storage_set_array_after')) {
	function lymcoin_storage_set_array_after($var_name, $after, $key, $value='') {
		global $LYMCOIN_STORAGE;
		if (!isset($LYMCOIN_STORAGE[$var_name])) $LYMCOIN_STORAGE[$var_name] = array();
		if (is_array($key))
			lymcoin_array_insert_after($LYMCOIN_STORAGE[$var_name], $after, $key);
		else
			lymcoin_array_insert_after($LYMCOIN_STORAGE[$var_name], $after, array($key=>$value));
	}
}

// Add array element before the key
if (!function_exists('lymcoin_storage_set_array_before')) {
	function lymcoin_storage_set_array_before($var_name, $before, $key, $value='') {
		global $LYMCOIN_STORAGE;
		if (!isset($LYMCOIN_STORAGE[$var_name])) $LYMCOIN_STORAGE[$var_name] = array();
		if (is_array($key))
			lymcoin_array_insert_before($LYMCOIN_STORAGE[$var_name], $before, $key);
		else
			lymcoin_array_insert_before($LYMCOIN_STORAGE[$var_name], $before, array($key=>$value));
	}
}

// Push element into array
if (!function_exists('lymcoin_storage_push_array')) {
	function lymcoin_storage_push_array($var_name, $key, $value) {
		global $LYMCOIN_STORAGE;
		if (!isset($LYMCOIN_STORAGE[$var_name])) $LYMCOIN_STORAGE[$var_name] = array();
		if ($key==='')
			array_push($LYMCOIN_STORAGE[$var_name], $value);
		else {
			if (!isset($LYMCOIN_STORAGE[$var_name][$key])) $LYMCOIN_STORAGE[$var_name][$key] = array();
			array_push($LYMCOIN_STORAGE[$var_name][$key], $value);
		}
	}
}

// Pop element from array
if (!function_exists('lymcoin_storage_pop_array')) {
	function lymcoin_storage_pop_array($var_name, $key='', $defa='') {
		global $LYMCOIN_STORAGE;
		$rez = $defa;
		if ($key==='') {
			if (isset($LYMCOIN_STORAGE[$var_name]) && is_array($LYMCOIN_STORAGE[$var_name]) && count($LYMCOIN_STORAGE[$var_name]) > 0) 
				$rez = array_pop($LYMCOIN_STORAGE[$var_name]);
		} else {
			if (isset($LYMCOIN_STORAGE[$var_name][$key]) && is_array($LYMCOIN_STORAGE[$var_name][$key]) && count($LYMCOIN_STORAGE[$var_name][$key]) > 0) 
				$rez = array_pop($LYMCOIN_STORAGE[$var_name][$key]);
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if (!function_exists('lymcoin_storage_inc_array')) {
	function lymcoin_storage_inc_array($var_name, $key, $value=1) {
		global $LYMCOIN_STORAGE;
		if (!isset($LYMCOIN_STORAGE[$var_name])) $LYMCOIN_STORAGE[$var_name] = array();
		if (empty($LYMCOIN_STORAGE[$var_name][$key])) $LYMCOIN_STORAGE[$var_name][$key] = 0;
		$LYMCOIN_STORAGE[$var_name][$key] += $value;
	}
}

// Concatenate array element with specified value
if (!function_exists('lymcoin_storage_concat_array')) {
	function lymcoin_storage_concat_array($var_name, $key, $value) {
		global $LYMCOIN_STORAGE;
		if (!isset($LYMCOIN_STORAGE[$var_name])) $LYMCOIN_STORAGE[$var_name] = array();
		if (empty($LYMCOIN_STORAGE[$var_name][$key])) $LYMCOIN_STORAGE[$var_name][$key] = '';
		$LYMCOIN_STORAGE[$var_name][$key] .= $value;
	}
}

// Call object's method
if (!function_exists('lymcoin_storage_call_obj_method')) {
	function lymcoin_storage_call_obj_method($var_name, $method, $param=null) {
		global $LYMCOIN_STORAGE;
		if ($param===null)
			return !empty($var_name) && !empty($method) && isset($LYMCOIN_STORAGE[$var_name]) ? $LYMCOIN_STORAGE[$var_name]->$method(): '';
		else
			return !empty($var_name) && !empty($method) && isset($LYMCOIN_STORAGE[$var_name]) ? $LYMCOIN_STORAGE[$var_name]->$method($param): '';
	}
}

// Get object's property
if (!function_exists('lymcoin_storage_get_obj_property')) {
	function lymcoin_storage_get_obj_property($var_name, $prop, $default='') {
		global $LYMCOIN_STORAGE;
		return !empty($var_name) && !empty($prop) && isset($LYMCOIN_STORAGE[$var_name]->$prop) ? $LYMCOIN_STORAGE[$var_name]->$prop : $default;
	}
}
?>