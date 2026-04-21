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
import { InspectorControls, useBlockProps, RichText, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { PanelBody, TextControl, SelectControl, Button} from '@wordpress/components';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';


// беремо enum прямо з block.json
import metadata from './block.json';


/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit({ attributes, setAttributes }) {

	const { anchorId, bloсkZindex, topRadius, backgroundType, blockTitle, topIndent, bottomIndent, bgImageUrl, bgImageId, workYears, workYearsDescription, rightText, leftText, listTitle, listSubTitle, blockList } = attributes;

	const blockProps = useBlockProps({
		className: topIndent + ' ' + bottomIndent
	});

	//Select image
	const onSelectImage = (media) => {
		setAttributes({
			bgImageUrl: media?.url || '',
			bgImageId: media?.id || '',
		});
	};

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

					<TextControl
						label={'Якір блоку'}
						help={'Це ідентеуфікатор блоку, він має бути унікальним. За його допомогою можна звернутися до блоку в меню тощо'}
						value={ anchorId || ''}
						onChange={ (value)=> setAttributes({ anchorId: value })}
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
				</PanelBody>
			</InspectorControls>
			<section { ...blockProps } >
				<div className="container">
					<div className="row">
						<RichText
							tagName="h2"
							className={'block-title'}
							value={ attributes.blockTitle }
							placeholder={'Заголовок блоку'}
							onChange={ (value)=>setAttributes({ blockTitle: value })}
							allowedFormats={ [ 'core/text-color' ] }
						/>
						<RichText
							tagName="p"
							className={'work-years'}
							value={ attributes.workYears }
							placeholder={'Кількість років працюємо'}
							onChange={ (value)=>setAttributes({ workYears: value })}
							allowedFormats={ [ 'core/text-color' ] }
						/>
						<RichText
							tagName="p"
							className={'work-years-description'}
							value={ attributes.workYearsDescription }
							placeholder={'Підпис для кількість років'}
							onChange={ (value)=>setAttributes({ workYearsDescription: value })}
							allowedFormats={ [ 'core/text-color' ] }
						/>
						<RichText
							tagName="div"
							multiline="p"
							identifier="leftText"
							className={'left-text'}
							value={ attributes.leftText }
							placeholder={'Текстовий блок ліворуч'}
							onChange={ (value)=>setAttributes({ leftText: value })}
							allowedFormats={ [ 'core/text-color', 'core/bold' ] }
							onSplit={() => {}}
						/>
						<RichText
							tagName="div"
							multiline="p"
							identifier="rightText"
							className={'right-text'}
							value={ attributes.rightText }
							placeholder={'Текстовий блок праворуч'}
							onChange={ (value)=>setAttributes({ rightText: value })}
							allowedFormats={ [ 'core/text-color', 'core/bold' ] }
							onSplit={() => {}}
						/>
						<RichText
							tagName="h2"
							className={'list-title'}
							value={ attributes.listTitle }
							placeholder={'Заголовок переліку'}
							onChange={ (value)=>setAttributes({ listTitle: value })}
							allowedFormats={ [ 'core/text-color', 'core/bold' ] }
						/>
						<RichText
							tagName="h3"
							className={'list-sub-title'}
							value={ attributes.listSubTitle }
							placeholder={'Підзаголовок переліку'}
							onChange={ (value)=>setAttributes({ listSubTitle: value })}
							allowedFormats={ [ 'core/text-color', 'core/bold' ] }
						/>
						<RichText
							tagName="ul"
							multiline="li"
							identifier="blockList"
							className={'block-list'}
							value={ attributes.blockList }
							placeholder={'Переліку переваг'}
							onChange={ (value)=>setAttributes({ blockList: value })}
							allowedFormats={ [ 'core/text-color', 'core/bold', 'core/link' ] }
							onSplit={() => {}}
						/>
						{bgImageUrl ? (
							<img src={bgImageUrl} />
						) : (
							<p>Зображення блоку не обрано</p>
						)}
						<MediaUploadCheck>
							<MediaUpload
								onSelect={onSelectImage}
								allowedTypes={['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml']}
								render={({ open }) => (
									<Button onClick={open} variant="primary">
										{bgImageUrl ? 'Змінити зображення блоку' : 'Завантажити зображення блоку'}
									</Button>
								)}
							/>
						</MediaUploadCheck>
					</div>
				</div>
			</section>
		</>
	);
}

