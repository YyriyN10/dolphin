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
import { PanelBody, TextControl, Button} from '@wordpress/components';

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

	const { starsCount, casesCount, blockText, blockTitle, btnText, bigBackgroundImageUrl, desktopBackgroundImageUrl, mobileBackgroundImageUrl, bloсkZindex} = attributes;

	const blockProps = useBlockProps();

	//Select image
	const bigSelectImage = (media) => {
		setAttributes({
			bigBackgroundImageUrl: media?.url || '',
		});
	};

	const desktopSelectImage = (media) => {
		setAttributes({
			desktopBackgroundImageUrl: media?.url || '',
		});
	};

	const mobileSelectImage = (media) => {
		setAttributes({
			mobileBackgroundImageUrl: media?.url || '',
		});
	};


	return (
		<>
			<InspectorControls>
				<PanelBody title={'Зображення фону'}  >

					{bigBackgroundImageUrl ? (
						<img src={bigBackgroundImageUrl} />
					) : (
						<p>Зображення для великих екранів не обрано</p>
					)}
					<MediaUploadCheck>
						<MediaUpload
							onSelect={bigSelectImage}
							allowedTypes={['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml']}
							render={({ open }) => (
								<Button onClick={open} variant="primary">
									{bigBackgroundImageUrl ? 'Змінити зображення для великих екранів' : 'Завантажити зображення для великих екранів'}
								</Button>
							)}
						/>
					</MediaUploadCheck>

					{desktopBackgroundImageUrl ? (
						<img src={desktopBackgroundImageUrl} />
					) : (
						<p>Зображення для десктопів не обрано</p>
					)}
					<MediaUploadCheck>
						<MediaUpload
							onSelect={desktopSelectImage}
							allowedTypes={['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml']}
							render={({ open }) => (
								<Button onClick={open} variant="primary">
									{desktopBackgroundImageUrl ? 'Змінити зображення для десктопів' : 'Завантажити зображення для десктопів'}
								</Button>
							)}
						/>
					</MediaUploadCheck>

					{mobileBackgroundImageUrl ? (
						<img src={mobileBackgroundImageUrl} />
					) : (
						<p>Зображення для мобільних не обрано</p>
					)}
					<MediaUploadCheck>
						<MediaUpload
							onSelect={mobileSelectImage}
							allowedTypes={['image/jpeg', 'image/png', 'image/webp', 'image/svg+xml']}
							render={({ open }) => (
								<Button onClick={open} variant="primary">
									{mobileBackgroundImageUrl ? 'Змінити зображення для мобільних' : 'Завантажити зображення для мобільних'}
								</Button>
							)}
						/>
					</MediaUploadCheck>
				</PanelBody>
				<PanelBody title={'Глибина блоку'}  >
					<TextControl
						label={'z-index блоку'}
						value={ bloсkZindex || ''}
						help={'Чим вижчий номер тим більший пріорітет'}
						type={'number'}
						onChange={ (value)=> setAttributes({ bloсkZindex: value })}
					/>
				</PanelBody>
				<PanelBody title={'Зірковий рейтинг'}  >
					<TextControl
						label={'Кількість зірок'}
						value={ starsCount || ''}
						type={'number'}
						onChange={ (value)=> setAttributes({ starsCount: value })}
					/>
				</PanelBody>
				<PanelBody title={'Кнопка'}  >
					<TextControl
						label={'Текст кнопки'}
						value={ btnText || ''}
						onChange={ (value)=> setAttributes({ btnText: value })}
					/>
				</PanelBody>
			</InspectorControls>
			<section { ...blockProps } >
				<div className="container">
					<div className="row">
						<RichText
							tagName="p"
							className={'cases-count'}
							value={ attributes.casesCount }
							placeholder={'Кількість успішних кейсів'}
							onChange={ (value)=>setAttributes({ casesCount: value })}
							allowedFormats={ [ 'core/text-color' ] }
						/>
						<RichText
							tagName="h1"
							className={'block-title'}
							value={ attributes.blockTitle }
							placeholder={'Заголовок сторінки'}
							onChange={ (value)=>setAttributes({ blockTitle: value })}
							allowedFormats={ [ 'core/text-color' ] }
						/>
						<RichText
							tagName="p"
							className={'block-text'}
							value={ attributes.blockText }
							placeholder={'Текст блоку'}
							onChange={ (value)=>setAttributes({ blockText: value })}
							allowedFormats={ [ 'core/bold', 'core/italic', 'core/text-color' ] }
						/>
					</div>
				</div>
			</section>
		</>
	);
}

