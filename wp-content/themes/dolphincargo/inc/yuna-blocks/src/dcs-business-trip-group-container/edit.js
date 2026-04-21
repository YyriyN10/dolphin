/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { InspectorControls, useBlockProps, InnerBlocks} from '@wordpress/block-editor';
import { PanelBody, TextControl, SelectControl, Button} from '@wordpress/components';


// беремо enum прямо з block.json
import metadata from './block.json';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {

	const { bloсkZindex, topRadius, backgroundType, topIndent, bottomIndent,} = attributes;

	const blockProps = useBlockProps();

	// Отримуємо enum topRadius з block.json
	const topRadiusOptions = metadata.attributes.topRadius.enum.map((value) => ({
		label: value,
		value: value,
	}));

	// Отримуємо enum backgroundType з block.json
	const backgroundTypeOptions = metadata.attributes.backgroundType.enum.map((value) => ({
		label: value,
		value: value,
	}));

	// Отримуємо enum bottomIndent з block.json
	const bottomIndentOptions = metadata.attributes.bottomIndent.enum.map((value) => ({
		label: value,
		value: value,
	}));

	// Отримуємо enum topIndent з block.json
	const topIndentOptions = metadata.attributes.topIndent.enum.map((value) => ({
		label: value,
		value: value,
	}));

	return (
		<>
			<InspectorControls>
				<PanelBody title={'Settings'}  >
					<TextControl
						label={'z-index блоку'}
						value={ bloсkZindex || ''}
						help={'Чим вижчий номер тим більший пріорітет'}
						type={'number'}
						onChange={ (value)=> setAttributes({ bloсkZindex: value })}
					/>

					<SelectControl
						label={__('Додати верхне скругління?')}
						value={topRadius}
						options={topRadiusOptions}
						onChange={(value) => setAttributes({ topRadius: value })}
					/>

					<SelectControl
						label={__('Обрати колір фону')}
						value={backgroundType}
						options={backgroundTypeOptions}
						onChange={(value) => setAttributes({ backgroundType: value })}
					/>
					<SelectControl
						label={__('Верхній внутрішній відступ')}
						value={topIndent}
						options={topIndentOptions}
						onChange={(value) => setAttributes({ topIndent: value })}
					/>

					<SelectControl
						label={__('Нижній внутрішній відступ')}
						value={bottomIndent}
						options={bottomIndentOptions}
						onChange={(value) => setAttributes({ bottomIndent: value })}
					/>
				</PanelBody>
			</InspectorControls>

			<section { ...blockProps } >
					<div className="row">
						<InnerBlocks/>
					</div>
			</section>
		</>
	);
}
