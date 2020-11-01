/**
 * External dependencies
 */
import React from 'react';

const InactiveModule = ( {
	message,
	name,
} ) => (
	<div className="ui-sortable et_vb_supportless_module et_pb_module et_pb_wc_inactive et_fb_nonexistent_module">
		<div className="et-vb-supportless-module-inner">
			<div className="et_pb_wc_inactive__name">{ name }</div>
			<div className="et_pb_wc_inactive__message">{ message }</div>
		</div>
	</div>
);

export default InactiveModule;
