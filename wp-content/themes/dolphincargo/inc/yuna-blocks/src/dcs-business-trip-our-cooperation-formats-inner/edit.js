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
import { useBlockProps, RichText, MediaUpload, MediaUploadCheck} from '@wordpress/block-editor';
import { PanelBody, TextControl, Button} from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { useEffect } from '@wordpress/element';


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
export default function Edit({ attributes, setAttributes, clientId}) {

	const {itemTeg, itemIcon, itemName, innerList, btnText} = attributes;

	//Block index
	const { blockIndexAttr } = { blockIndexAttr: attributes.blockIndex ?? 0 };

	const index = useSelect( ( select ) => {
		const be = select( 'core/block-editor' );
		const rootId = be.getBlockRootClientId( clientId );        // батьківський блок
		const idx = be.getBlockIndex( clientId, rootId );           // 0-based індекс
		return typeof idx === 'number' ? idx : 0;
	}, [ clientId ] );

	useEffect( () => {
		if ( index !== blockIndexAttr ) {
			setAttributes( { blockIndex: index } );
		}
	}, [ index ] );

	const blockProps = useBlockProps();

	//Select image
	const onSelectImage = (media) => {
		setAttributes({
			itemIcon: media?.url || '',
		});
	};


	return (
		<>
			<div { ...blockProps } >

				<TextControl
					label={'Текст тегу'}
					value={ itemTeg || ''}
					onChange={ (value)=> setAttributes({ itemTeg: value })}
				/>

				{itemIcon ? (
					<img src={itemIcon} />
				) : (
					<p>Зображення іконки не обрано</p>
				)}
				<MediaUploadCheck>
					<MediaUpload
						onSelect={onSelectImage}
						allowedTypes={['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml']}
						render={({ open }) => (
							<Button onClick={open} variant="primary">
								{itemIcon ? 'Змінити зображення іконки' : 'Завантажити зображення іконки'}
							</Button>
						)}
					/>
				</MediaUploadCheck>

				<RichText
					tagName="h3"
					className={'item-name'}
					value={ attributes.itemName }
					placeholder={'Назва картки'}
					onChange={ (value)=>setAttributes({ itemName: value })}
					allowedFormats={ [ 'core/bold', 'core/italic', 'core/text-color' ] }
				/>

				<RichText
					tagName="p"
					className={'item-description'}
					value={ attributes.itemDescription }
					placeholder={'Короткий опис'}
					onChange={ (value)=>setAttributes({ itemDescription: value })}
					allowedFormats={ [ 'core/bold', 'core/italic', 'core/text-color' ] }
				/>

				<RichText
					tagName="ul"
					multiline="li"
					identifier="blockList"
					className={'item-list'}
					value={ attributes.innerList }
					placeholder={'Текст переліку'}
					onChange={ (value)=>setAttributes({ innerList: value })}
					allowedFormats={ [ 'core/bold', 'core/italic', 'core/text-color' ] }
					onSplit={() => {}}
				/>
				<TextControl
					label={'Текст кнопки'}
					value={ btnText || ''}
					onChange={ (value)=> setAttributes({ btnText: value })}
				/>

			</div>
		</>
	);
}
